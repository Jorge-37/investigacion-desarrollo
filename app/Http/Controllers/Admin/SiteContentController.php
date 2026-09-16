<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContent;

class SiteContentController extends Controller
{
     public function index()
    {
        $contents = SiteContent::all();

        return view('admin.contents.index', compact('contents'));
    }
}
