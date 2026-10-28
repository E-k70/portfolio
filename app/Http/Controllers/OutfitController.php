<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use App\Models\Filter;
use Illuminate\Http\Request;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Outfit::with('filter');

        if ($request->filled('filter')) {
            $query->where('filter_id', $request->filter);
        }

        $outfits = $query->get();
        $filters = Filter::all();

        return view('outfits.index', compact('outfits', 'filters'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outfits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validatie op de data
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'image_url' => 'required'
        ]);

        //info in database zetten
        $outfit = new Outfit();
        $outfit->title = $request->input('title');
        $outfit->description = $request->input('description');
        $outfit->image_url = $request->input('image_url');

        $outfit->save();

        //redirect naar outfits.index
        return redirect()->route('outfits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outfit $outfit)
    {
        return view('outfits.show', compact('outfit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();

        return redirect()->route('outfits.index')
            ->with('success', 'Outfit deleted successfully.');
    }
}
