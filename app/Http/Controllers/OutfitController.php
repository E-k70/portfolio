<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Outfit::with('filter')->withCount('likedBy')->where('active', true);

        if ($request->filled('filter')) {
            $query->where('filter_id', $request->filter);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $outfits = $query->get();
        $filters = Filter::all();

        $likedIds = auth()->check()
            ? auth()->user()->likedOutfits()->pluck('outfits.id')->all()
            : [];

        return view('outfits.index', compact('outfits', 'filters', 'likedIds'));


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filters = Filter::all();

        return view('outfits.create', compact('filters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validatie op de data
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|max:255',
            'image_url' => 'required|url|max:2048',
            'filter_id' => 'nullable|exists:filters,id'
        ]);

        //info in database zetten
        $outfit = new Outfit();
        $outfit->user_id = auth()->id();
        $outfit->filter_id = $request->input('filter_id');
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
        if (!$outfit->active && !Gate::allows('update', $outfit)) {
            abort(404);
        }

        return view('outfits.show', compact('outfit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outfit $outfit)
    {
        Gate::authorize('update', $outfit);

        $filters = Filter::all();

        return view('outfits.edit', compact('outfit', 'filters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outfit $outfit)
    {
        Gate::authorize('update', $outfit);

        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'image_url' => 'required',
            'filter_id' => 'nullable|exists:filters,id',
        ]);

        $outfit->update($validated);

        return redirect()->route('outfits.show', $outfit)
            ->with('success', 'Outfit updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outfit $outfit)
    {
        Gate::authorize('delete', $outfit);

        $outfit->delete();

        return redirect()->route('outfits.index')
            ->with('success', 'Outfit deleted successfully.');
    }

    public function toggleLike(Request $request, Outfit $outfit)
    {
        abort_unless($outfit->active, 404);
        
        $request->user()->likedOutfits()->toggle($outfit->id);

        return back();
    }
}
