<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('photo.gallery');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione
        $request->validate([
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'zip' => 'nullable|file|mimes:zip'
        ]);

        // 1️⃣ Upload singole immagini
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery', 'public');
            }
        }

        // 2️⃣ Upload ZIP → estrazione cartella
        if ($request->hasFile('zip')) {
            $zipPath = $request->file('zip')->store('temp', 'public');

            $zip = new \ZipArchive;
            if ($zip->open(storage_path('app/public/' . $zipPath)) === TRUE) {

                $zip->extractTo(storage_path('app/public/gallery'));
                $zip->close();
            }

            // elimina il file zip
            Storage::disk('public')->delete($zipPath);
        }
        Photo::create(['path' => $path]);

        return redirect()->route('photo.gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
