<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function create()
    {
        return view('pages.manual_create', [
            'brands' => Brand::orderBy('name')->get(),
            'manuals' => Manual::with('brand')->orderByDesc('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => ['required', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:255'],
            'filesize' => ['nullable', 'integer', 'min:0'],
            'originUrl' => ['required', 'url', 'max:255'],
            'filename' => ['nullable', 'string', 'max:255'],
            'downloadedServer' => ['nullable', 'string', 'max:255'],
            'counter' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['counter'] = $validated['counter'] ?? 0;

        Manual::create($validated);

        return redirect()->route('admin.manuals.create')->with('success', 'Handleiding toegevoegd.');
    }

    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        $manual->increment("counter");

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function destroy(Manual $manual)
    {
        $manual->delete();

        return redirect()->route('admin.manuals.create')->with('success', 'Handleiding verwijderd.');
    }
}
