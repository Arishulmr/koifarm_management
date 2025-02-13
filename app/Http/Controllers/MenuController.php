<?php

namespace App\Http\Controllers;

use App\Models\ItemMenu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:r-menus', only : ['index', 'show']),
            new Middleware('permission:c-menus', only : ['create', 'store']),
            new Middleware('permission:u-menus', only : ['edit', 'update']),
            new Middleware('permission:d-menus', only : ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = ItemMenu::when(request()->search, function ($menus) {
            $menus = $menus->where('title', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('menus.index', compact('menus'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = ItemMenu::whereNull('parent_id')->get();
        return view('menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'parent_id' => ['nullable', 'exists:item_menus,id'],
            'url' => ['required', 'string'],
            'tag' => ['nullable', 'string'],
            'permission' => ['nullable', 'string'],
            'icon_menu' => ['nullable'],
            'status' => ['required', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $menu = ItemMenu::create([
                'parent_id' => $request->parent_id,
                'title' => $request->title,
                'url' => $request->url,
                'tag' => $request->tag,
                'icon_menu' => $request->icon_menu,
                'permission' => $request->permission,
                'status' => $request->status,
            ]);

            DB::commit();
            return redirect()->route('menus.index')->with('success', 'Menu ' . $menu->title . ' has been added successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->route('menus.index')->with('error', 'Oops, something wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemMenu $menu)
    {
        $menus = ItemMenu::whereNull('parent_id')->get();
        return view('menus.edit', compact('menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemMenu $menu)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'parent_id' => ['nullable', 'exists:item_menus,id'],
            'url' => ['required', 'string'],
            'tag' => ['nullable', 'string'],
            'permission' => ['nullable', 'string'],
            'icon_menu' => ['nullable'],
            'status' => ['required', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $menu->update([
                'parent_id' => $request->parent_id,
                'title' => $request->title,
                'url' => $request->url,
                'tag' => $request->tag,
                'icon_menu' => $request->icon_menu,
                'permission' => $request->permission,
                'status' => $request->status,
            ]);

            $menu->save();

            DB::commit();
            return redirect()->route('menus.index')->with('success', 'Menu ' . $menu->title . ' has been updated successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->route('menus.index')->with('error', 'Oops, something wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = ItemMenu::find($id);
        $menu->delete();

        if ($menu) {
            //redirect dengan pesan sukses
            return redirect()->route('menus.index')->with(['success' => 'Menu ' . $menu->title . ' has been deleted successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('menus.index')->with(['error' => 'Oops, failed to delete!']);
        }
    }
}