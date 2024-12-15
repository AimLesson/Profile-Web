<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Berita;

class InstitusiController extends Controller
{
    public function index($slug)
    {
        $institusi = Institusi::where('slug', $slug)->firstOrFail();
        $beritas = Berita::where('institusi_id', $institusi->id)->latest()->get();
        return view('front.institusi_detail', compact('institusi','beritas'));
    }

    public function about($institusiSlug = null)
    {
        if ($institusiSlug) {
            $institusi = Institusi::where('slug', $institusiSlug)->with('about')->firstOrFail();
        } else {
            // Load a default institusi or handle the case where no slug is provided
            $institusi = Institusi::first(); // or define a default Institusi instance
        }

        return view('front.about', compact('institusi'));
    }


    public function list()
    {
        $institusiList = Institusi::all();
        return view('front.institusi', compact('institusiList'));
    }

    public function show($slug)
    {
        $institusi = Institusi::where('slug', $slug)->firstOrFail();
        $beritas = Berita::where('institusi_id', $institusi->id)->latest()->get();

        return view('front.home', compact('institusi', 'beritas'));
    }
}
