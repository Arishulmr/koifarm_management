<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Breeder;
use App\Models\Certificate;
use App\Models\Fish;
use App\Models\FishSize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fishes = Fish::with(['breeder', 'user'])->get();
        return view('fishes.index', compact('fishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breeders = Breeder::all();
        return view('fishes.create', compact('breeders')) ;
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         DB::beginTransaction();
         try {
             // Create the Fish record first
             $fish = Fish::create([
                 'fish_code' => $request->fish_code,
                 'fish_variety' => $request->fish_variety,
                 'breeder_id' => $request->breeder_id,
                 'fish_price' => $request->fish_price,
                 'fish_birth_date' => $request->fish_birth_date,
                 'fish_import_date' => $request->fish_import_date,
                 'fish_image' => $request->fish_image,
             ]);

             // Store multiple fish sizes & weights
             if ($request->fish_size ) {
                     FishSize::create([
                         'fish_id' => $fish->fish_id,
                         'fish_size' => $request->fish_size,
                         'fish_weight' => $request->fish_weight,
                         'measured_date' => $request->measured_date
                     ]);
             }

             // Store Birth Certificate
             if ($request->hasFile('certificate_file')) {
                 $certificatePath = $request->file('certificate_file')->store('certificates', 'public');
             } else {
                 $certificatePath = null;
             }

             Certificate::create([
                 'fish_id' => $fish->fish_id,
                 'certificate_number' => $request->certificate_number,
                 'issued_date' => $request->certificate_issued_date,
                 'certificate_file' => $certificatePath,
             ]);

             // Store multiple awards
             if ($request->award_placements) {
                 foreach ($request->award_placements as $index => $placement) {
                     $awardFilePath = $request->hasFile("award_files.$index")
                         ? $request->file("award_files.$index")->store('awards', 'public')
                         : null;

                     Award::create([
                         'fish_id' => $fish->fish_id,
                         'placement' => $placement,
                         'award_date' => $request->award_dates[$index] ?? null,
                         'certificate_file' => $awardFilePath,
                     ]);
                 }
             }

             DB::commit();
             return redirect()->route('fishes.create')->with('success', 'Fish has been added successfully!');
         } catch (\Throwable $th) {
             DB::rollBack();
             return redirect()->route('fishes.index')->with('error', 'Oops, something went wrong!');
         }
     }



    /**
     * Display the specified resource.
     */
    public function show(Fish $fish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fish $fish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fish $fish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fish $fish)
    {
        //
    }
}