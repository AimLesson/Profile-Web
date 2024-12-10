<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'required|string|max:255',
            'embedYT' => 'required|string',
            'tanggal' => 'required|date',
        ]);
    
        // Extract first few sentences from 'konten' for 'deskripsi'
        $konten = $validated['konten'];
        $deskripsi = $this->generateDeskripsi($konten);
        $validated['deskripsi'] = $deskripsi;
    
        // Handle file upload
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images/berita', 'public');
            $validated['gambar'] = $gambarPath;
        }
    
        Berita::create($validated);
    
        return redirect()->route('berita.index')->with('success', 'Berita created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'required|string|max:255',
            'embedYT' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);
    
        // Extract first few sentences from 'konten' for 'deskripsi'
        $konten = $validated['konten'];
        $deskripsi = $this->generateDeskripsi($konten);
        $validated['deskripsi'] = $deskripsi;
    
        // Handle file upload
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images/berita', 'public');
            $validated['gambar'] = $gambarPath;
        }
    
        $berita->update($validated);
    
        return redirect()->route('berita.index')->with('success', 'Berita updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully!');
    }

    private function generateDeskripsi(string $konten): string
    {
        // Split content into sentences using a simple regex
        $sentences = preg_split('/(\.|\?|\!)(\s)/', $konten, 3, PREG_SPLIT_DELIM_CAPTURE);

        // Combine the first two sentences (or less if fewer are available)
        $deskripsi = implode('', array_slice($sentences, 0, 5)); // Adjust `5` for more sentences if needed

        // Trim the result and ensure it fits within the database limit
        return substr(trim($deskripsi), 0, 255);
    }

}
