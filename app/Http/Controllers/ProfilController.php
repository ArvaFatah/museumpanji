<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index(){
        $profil = Profil::first();
        if(empty($profil)){
            $profil = (object) [
                'judul' => '',
                'deskripsi' => ''
            ];
        }
        return view('auth/profil/index', [
            'profil' => $profil,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'judul' => 'required',
        ];
        $messages = [
            'judul.required' => 'Judul wajib diisi',
        ];

        $request->validate($rules, $messages);

        $profil = Profil::first();

        
        if(empty($profil)){
            $profil = new Profil;
        }

        $profil->judul = $request->judul;
        $profil->deskripsi = $request->deskripsi;
        $save = $profil->save();

        if($save){
            return redirect()->route('admin.profil')->with('success', 'Berhasil menambahkan profil: '.$request->judul);
        }else{
            return redirect()->route('admin.profil')->with('error', 'Gagal menembahkan user: '.$request->judul);
        }
    }
}
