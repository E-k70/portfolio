<?php

namespace App\Http\Controllers;

use App\Models\Outfit;

class AdminOutfitController extends Controller
{
    public function index()
    {
        $outfits = Outfit::with(['user', 'filter'])->latest()->get();

        return view('admin.outfits.index', compact('outfits'));
    }

    public function toggle(Outfit $outfit)
    {
        $outfit->active = !$outfit->active;
        $outfit->save();

        return back();
    }
}
