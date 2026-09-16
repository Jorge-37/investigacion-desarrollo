<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\VisitImage;
use Illuminate\Support\Facades\Storage;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::with('images')
            ->orderBy('visit_date', 'desc')
            ->get();

        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        return view('visits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'institution' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'visit_date' => 'nullable|date',

                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
            ],
            [
                'institution.required' => 'Debes ingresar el nombre de la institución.',
                'title.required' => 'Debes ingresar un título.',
                'visit_date.date' => 'La fecha ingresada no es válida.',
                'images.*.image' => 'Todos los archivos deben ser imágenes.',
                'images.*.mimes' => 'Las imágenes deben ser JPG, JPEG, PNG o WEBP.',
                'images.*.max' => 'Cada imagen puede pesar como máximo 10 MB.',
            ]
        );

        $visit = Visit::create([
            'institution' => $validated['institution'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'visit_date' => $validated['visit_date'] ?? null,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('visits', 'public');

                VisitImage::create([
                    'visit_id' => $visit->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.visits.index')
            ->with('success', 'Visita registrada correctamente.');
    }

    public function edit(Visit $visit)
    {
        $visit->load('images');

        return view('visits.edit', compact('visit'));
    }

    public function update(Request $request, Visit $visit)
    {
        $validated = $request->validate(
            [
                'institution' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'visit_date' => 'nullable|date',

                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
            ],
            [
                'institution.required' => 'Debes ingresar el nombre de la institución.',
                'title.required' => 'Debes ingresar un título.',
                'visit_date.date' => 'La fecha ingresada no es válida.',
                'images.*.image' => 'Todos los archivos deben ser imágenes.',
                'images.*.mimes' => 'Las imágenes deben ser JPG, JPEG, PNG o WEBP.',
                'images.*.max' => 'Cada imagen puede pesar como máximo 10 MB.',
            ]
        );

        $visit->update([
            'institution' => $validated['institution'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'visit_date' => $validated['visit_date'] ?? null,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('visits', 'public');

                VisitImage::create([
                    'visit_id' => $visit->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.visits.index')
            ->with('success', 'Visita actualizada correctamente.');
    }

    public function destroy(Visit $visit)
    {
        foreach ($visit->images as $image) {

            if (
                $image->image &&
                Storage::disk('public')->exists($image->image)
            ) {
                Storage::disk('public')->delete($image->image);
            }
        }

        $visit->delete();

        return redirect()
            ->route('admin.visits.index')
            ->with('success', 'Visita eliminada correctamente.');
    }

    public function destroyImage(VisitImage $image)
    {
        if (
            $image->image &&
            Storage::disk('public')->exists($image->image)
        ) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return back()->with(
            'success',
            'Imagen eliminada correctamente.'
        );
    }

    /* =========================================================
   PÁGINA PÚBLICA DE VISITAS
   ========================================================= */

    public function publicIndex()
    {
        $visits = Visit::with('images')
            ->orderBy('visit_date', 'desc')
            ->get();

        return view('visitas', compact('visits'));
    }
}
