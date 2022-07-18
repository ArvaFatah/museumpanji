<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showFormLogin(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request){
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string'
        ];
        $messages = [
            'username.required' => 'Username Wajib diisi',
            'username.string' => 'Username invalid, harus berupa string',
            'password.required' => 'Password Wajib diisi',
            'password.string' => 'Password invalid, harus berupa string ',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
        // dd($data);
        
        Auth::attempt($data);

        if(Auth::check()){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Login gagal! User tidak ditemukan.');;
        }
    }

    public function register(Request $request){
        $rules = [
            'name' => 'required|max:35',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'role' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama Wajib diisi',
            'name.min' => 'Nama maksimal 35 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'role.required' => 'Role wajib diisi',
        ];
        // $validator = Validator::make($request->all(), $rules, $messages);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }

        $user = new User;
        // $user->name = ucwords(strtolower($request->name));
        // $user->username = strtolower($request->username);
        // $user->password = Hash::make($request->password());
        $user->name = ucwords(strtolower('Pemberi Persetujuan 1'));
        $user->username = strtolower('approver');
        $user->password = Hash::make('approver');
        $user->role = "1";
        $user->status = "1";
        $save = $user->save();

        if($save){
            Session::flash('success', 'Register berhasil!');
            return redirect()->route('login');
        }else{
            Session::flash('error', ['' => 'Register gagal!']);
            return redirect()->route('register');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
