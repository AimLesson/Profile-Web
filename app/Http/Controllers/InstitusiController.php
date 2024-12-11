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

    public function about($institusiSlug)
    {
        $institusi = Institusi::where('slug', $institusiSlug)->with('about')->firstOrFail();
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
