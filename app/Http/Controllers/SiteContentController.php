<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    /**
     * Mostrar todos los contenidos.
     */
    public function index()
    {
        $contents = SiteContent::orderBy('section')
            ->orderBy('key')
            ->get();

        return view('contents.index', compact('contents'));
    }


    /**
     * Mostrar formulario para crear contenido.
     */
    public function create()
    {
        return view('contents.create');
    }


    /**
     * Guardar nuevo contenido.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:site_contents,key',
            'content' => 'required|string',
        ]);

        SiteContent::create([
            'section' => $validated['section'],
            'key' => $validated['key'],
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('admin.contents.index')
            ->with('success', 'Contenido agregado correctamente.');
    }


    /**
     * Mostrar formulario de edición.
     */
    public function edit(SiteContent $content)
    {
        return view('contents.edit', compact('content'));
    }


    /**
     * Actualizar contenido.
     */
    public function update(Request $request, SiteContent $content)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:site_contents,key,' . $content->id,
            'content' => 'required|string',
        ]);

        $content->update([
            'section' => $validated['section'],
            'key' => $validated['key'],
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('admin.contents.index')
            ->with('success', 'Contenido actualizado correctamente.');
    }


    /**
     * Eliminar contenido.
     */
    public function destroy(SiteContent $content)
    {
        $content->delete();

        return redirect()
            ->route('admin.contents.index')
            ->with('success', 'Contenido eliminado correctamente.');
    }
}