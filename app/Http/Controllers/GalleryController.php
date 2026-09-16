<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    private function recursosPermitidos(): array
    {
        return [
            'Inicio' => ['Banner', 'Presentación'],
            'Galería' => ['Bee-Bot', 'Mekorama', 'Blue-Bot', 'Ludio Max', 'mBot'],
            'Programas' => ['Robótica Educativa', 'Diseño 3D e Impresión', 'Inteligencia Artificial y Ética', 'Pensamiento Computacional'],
            'Visitas' => ['Visita destacada 1', 'Visita destacada 2'],
            'Silvia TV' => ['Imagen Silvia TV'],
            'Capacitaciones' => ['Capacitación 1', 'Capacitación 2', 'Capacitación 3', 'Capacitación 4', 'Ejército 1', 'Ejército 2', 'Ejército 3'],
        ];
    }

    public function index()
    {
        $galleries = Gallery::orderBy('section')->orderBy('name')->get();
        return view('gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $recursos = $this->recursosPermitidos();

        $validated = $request->validate([
            'section' => ['required', Rule::in(array_keys($recursos))],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['Imagen', 'Video'])],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'file', 'max:102400'],
        ]);

        if (
            !isset($recursos[$validated['section']]) ||
            !in_array($validated['name'], $recursos[$validated['section']], true)
        ) {
            return back()->withInput()->withErrors([
                'name' => 'El recurso seleccionado no corresponde a esa sección.',
            ]);
        }

        if ($validated['type'] === 'Imagen') {
            $request->validate([
                'image' => 'required|file|max:102400|mimes:jpg,jpeg,png,webp',
            ], [
                'image.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            ]);
        } else {
            $request->validate([
                'image' => 'required|file|max:102400|mimes:mp4,mov,avi',
            ], [
                'image.mimes' => 'El video debe ser MP4, MOV o AVI.',
            ]);
        }

        $existe = Gallery::where('section', $validated['section'])
            ->where('name', $validated['name'])
            ->exists();

        if ($existe) {
            return back()->withInput()->withErrors([
                'name' => 'Ese recurso ya está registrado. Utiliza Editar para reemplazarlo.',
            ]);
        }

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'section' => $validated['section'],
            'type' => $validated['type'],
            'name' => $validated['name'],
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $path,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Recurso registrado correctamente.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $recursos = $this->recursosPermitidos();

        $validated = $request->validate([
            'section' => ['required', Rule::in(array_keys($recursos))],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['Imagen', 'Video'])],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'max:102400'],
        ]);

        if (
            !isset($recursos[$validated['section']]) ||
            !in_array($validated['name'], $recursos[$validated['section']], true)
        ) {
            return back()->withInput()->withErrors([
                'name' => 'El recurso seleccionado no corresponde a esa sección.',
            ]);
        }

        $existe = Gallery::where('section', $validated['section'])
            ->where('name', $validated['name'])
            ->where('id', '!=', $gallery->id)
            ->exists();

        if ($existe) {
            return back()->withInput()->withErrors([
                'name' => 'Ya existe otro recurso con esa sección y nombre.',
            ]);
        }

        if ($validated['type'] !== $gallery->type && !$request->hasFile('image')) {
            return back()->withInput()->withErrors([
                'image' => 'Al cambiar entre Imagen y Video debes seleccionar un archivo nuevo.',
            ]);
        }

        if ($request->hasFile('image')) {
            if ($validated['type'] === 'Imagen') {
                $request->validate([
                    'image' => 'file|max:102400|mimes:jpg,jpeg,png,webp',
                ], [
                    'image.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
                ]);
            } else {
                $request->validate([
                    'image' => 'file|max:102400|mimes:mp4,mov,avi',
                ], [
                    'image.mimes' => 'El video debe ser MP4, MOV o AVI.',
                ]);
            }

            $nuevoPath = $request->file('image')->store('gallery', 'public');

            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->image = $nuevoPath;
        }

        $gallery->section = $validated['section'];
        $gallery->type = $validated['type'];
        $gallery->name = $validated['name'];
        $gallery->title = $validated['title'] ?? null;
        $gallery->description = $validated['description'] ?? null;
        $gallery->save();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Recurso actualizado correctamente.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Recurso eliminado correctamente.');
    }
}
