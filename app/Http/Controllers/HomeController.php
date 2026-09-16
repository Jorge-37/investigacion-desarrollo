<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener los textos
        $contents = SiteContent::get()->keyBy('key');

        // Obtener las imágenes de la galería
        $galleries = Gallery::latest()->get();

        return view('home', compact('contents', 'galleries'));
    }
}