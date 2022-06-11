<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserManageController extends Controller
{
    public function index(){
        $users = User::where('status', '1')->get();
        return view('auth.master.user.index', [
            'users' => $users
        ]);
    }

    public function pageNew(){
        return view('auth.master.user.new');
    }

    public function postNew(Request $request){
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
        // dd($request->name);

        $request->validate($rules, $messages);

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = "1";
        $save = $user->save();

        if($save){
            return redirect()->route('new.user')->with('success', 'Berhasil menambahkan user '.$request->name);
        }else{
            return redirect()->route('new.user')->with('error', 'Gagal menembahkan user '.$request->name);
        }

    }

    public function pageEdit($id){
        $user = User::find($id);
        return view('auth.master.user.edit', [
            'user' => $user
        ]);
    }

    public function postEdit(Request $request, $id){
        $rules = [
            'name' => 'required|max:35',
            'username' => 'required|unique:users,username,'.$id,
            'role' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama Wajib diisi',
            'name.min' => 'Nama maksimal 35 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'role.required' => 'Role wajib diisi',
        ];
        // dd($request->name);

        $request->validate($rules, $messages);

        $user = User::find($id);

        if($user){
            $user->name = ucwords(strtolower($request->name));
            $user->username = strtolower($request->username);
            $user->role = $request->role;
            $user->status = "1";
            $save = $user->save();

            if($save){
                return redirect()->route('index.user')->with('success', 'Berhasil menambahkan user '.$request->name);
            }else{
                return redirect()->route('index.user')->with('error', 'Gagal menembahkan user '.$request->name);
            }
        }else{
            return redirect()->route('index.user')->with('error', 'User tidak ditemukan '.$request->name);
        }

    }

    public function delete($id){
        $user = User::find($id);
        if($user){
            $user->status = "0";
            $user->save();
            return redirect()->route('index.user')->with('success', 'Berhasil menghapus data user '.$user->name.'. Buka menu bin untuk menampilkan data yang terhapus');
        }else{
            return redirect()->route('index.user')->with('error', 'Tidak menemukan data user');
        }
    }

    public function bulkDelete($ids){
        $ids = explode(',',$ids);
        
        $user = User::whereIn("id", $ids)
        ->update([
            "status" => "0"
        ]);

        if($user){
            return redirect()->route('index.user')->with('success', 'Berhasil menghapus data user. Buka menu bin untuk menampilkan data yang terhapus');
        }else{
            return redirect()->route('index.user')->with('error', 'Tidak menemukan data user');
        }
    }
}
