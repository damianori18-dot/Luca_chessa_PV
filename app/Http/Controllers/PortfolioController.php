<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use App\Models\PortfolioSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class PortfolioController extends Controller
{
    public function index()
    {
        $sets = PortfolioSet::latest()->get();

        return view('portfolio.index', compact('sets'));
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['required', 'image'],
        ]);

        $storedPaths = [];

        try {
            $set = DB::transaction(function () use ($validated, &$storedPaths) {
                $set = PortfolioSet::create([
                    'title' => $validated['title'],
                    'slug' => Str::slug($validated['title']),
                    'access_code' => Str::random(8),
                ]);

                foreach ($validated['images'] as $index => $image) {
                    $path = $image->store('portfolio/'.$set->id, 'public');

                    if ($path === false) {
                        throw new RuntimeException('Unable to store a portfolio image.');
                    }

                    $storedPaths[] = $path;

                    PortfolioImage::create([
                        'set_id' => $set->id,
                        'path' => $path,
                    ]);

                    if ($index === 0) {
                        $set->update(['preview_image' => $path]);
                    }
                }

                return $set;
            });
        } catch (Throwable $exception) {
            $disk = Storage::disk('public');
            $failedDeletions = [];

            foreach ($storedPaths as $path) {
                if (! $disk->delete($path)) {
                    $failedDeletions[] = $path;
                }
            }

            if ($failedDeletions !== []) {
                report(new RuntimeException(
                    'Unable to remove portfolio images after a failed save: '.implode(', ', $failedDeletions),
                    previous: $exception,
                ));
            }

            throw $exception;
        }

        return redirect()->route('portfolio.index')->with('success', 'Set creato! Codice accesso: '.$set->access_code);
    }

    public function show($slug)
    {
        $set = PortfolioSet::where('slug', $slug)->firstOrFail();

        if (! $set->userHasAccess()) {
            return view('portfolio.access', compact('set'));
        }

        return view('portfolio.show', compact('set'));
    }

    public function checkAccess(Request $request, $id)
    {
        $set = PortfolioSet::findOrFail($id);

        if ($request->code === $set->access_code) {
            session()->put('portfolio_access_'.$set->id, $set->access_code);

            return redirect()->route('portfolio.show', $set->slug);
        }

        return back()->withErrors(['code' => 'Codice errato']);
    }
}
