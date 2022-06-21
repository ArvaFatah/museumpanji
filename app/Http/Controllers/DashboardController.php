<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index(){

        $user = User::where('status', '1')->get();
        $gallery = Gallery::where('status', '1')->get();

        return view('auth/dashboard', [
            'totaluser' => $user->count(),
            'totalvirtual' => 0,
            'totalgallery' => $gallery->count(),
        ]);
    }
}
