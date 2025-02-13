<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Breeder;
use App\Models\Certificate;
use App\Models\Fish;
use App\Models\FishSize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // Handle fish image upload
        if ($request->hasFile('fish_image')) {
            $fishImagePath = $request->file('fish_image')->store('fish_images', 'public');
        } else {
            $fishImagePath = null;
        }

        // Create the Fish record first
        $fish = Fish::create([
            'fish_code' => $request->fish_code,
            'fish_variety' => $request->fish_variety,
            'breeder_id' => $request->breeder_id,
            'fish_price' => $request->fish_price,
            'fish_birth_date' => $request->fish_birth_date,
            'fish_import_date' => $request->fish_import_date,
            'fish_image' => $fishImagePath,
            'user_id' => Auth::user()->id,
        ]);

        // Store Fish Size (Foreign Key fish_id)
        if ($request->fish_size) {
            FishSize::create([
                'user_id' => Auth::user()->id,
                'fish_id' => $fish->fish_id, // Use the correct fish_id from $fish
                'fish_size' => $request->fish_size,  // Ensure correct column names
                'fish_weight' => $request->fish_weight,
                'measured_date' => $request->measured_date,
            ]);
        }

        // Handle certificate file upload
        if ($request->hasFile('certificate_file')) {
            $certificatePath = $request->file('certificate_file')->store('certificates', 'public');
        } else {
            $certificatePath = null;
        }

        // Store Birth Certificate (Foreign Key fish_id)
        Certificate::create([
            'fish_id' => $fish->fish_id, // Use correct fish_id
            'certificate_code' => $request->certificate_number,
            'certificate_date' => $request->certificate_issued_date,
            'certificate_file' => $certificatePath,
        ]);

        DB::commit();
        return redirect()->route('fishes.create')->with('success', 'Fish has been added successfully!');
    } catch (\Throwable $th) {
        DB::rollBack();

        // Debugging: Log the error message
        Log::error('Error saving fish: ' . $th->getMessage());

        return redirect()->route('fishes.create')->with('error', 'Oops, something went wrong!');
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