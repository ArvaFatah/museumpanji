<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){

        $user = User::get();

        $chart = [];

        return view('auth/dashboard', [
            'approver' => $user->count(),
        ]);
    }
}
