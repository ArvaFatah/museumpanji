<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){

        return view('auth/gallery/index', [

        ]);
    }

    public function addpage(){

        return view('auth/gallery/new', [

        ]);
    }
}
