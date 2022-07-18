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
        return view('auth/user/index', [
            'users' => $users
        ]);
    }

    public function pageNew(){
        return view('auth/user/new');
    }

    public function postNew(Request $request){
        $rules = [
            'name' => 'required|max:35',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
        ];
        $messages = [
            'name.required' => 'Nama Wajib diisi',
            'name.max' => 'Nama maksimal 35 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
        ];
        // dd($request->name);

        $request->validate($rules, $messages);

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $user->status = "1";
        $save = $user->save();

        if($save){
            return redirect()->route('admin.user')->with('success', 'Berhasil menambahkan user '.$request->name);
        }else{
            return redirect()->route('admin.user')->with('error', 'Gagal menembahkan user '.$request->name);
        }

    }

    public function pageEdit($id){
        $user = User::find($id);
        return view('auth/user.edit', [
            'user' => $user
        ]);
    }

    public function postEdit(Request $request, $id){
        $rules = [
            'name' => 'required|max:35',
            'username' => 'required|unique:users,username,'.$id,
        ];
        $messages = [
            'name.required' => 'Nama Wajib diisi',
            'name.min' => 'Nama maksimal 35 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
        ];
        // dd($request->name);

        $request->validate($rules, $messages);

        $user = User::find($id);

        if($user){
            $user->name = ucwords(strtolower($request->name));
            $user->username = strtolower($request->username);
            $user->status = "1";
            $save = $user->save();

            if($save){
                return redirect()->route('admin.user')->with('success', 'Berhasil menambahkan user '.$request->name);
            }else{
                return redirect()->route('admin.user')->with('error', 'Gagal menembahkan user '.$request->name);
            }
        }else{
            return redirect()->route('admin.user')->with('error', 'User tidak ditemukan '.$request->name);
        }

    }

    public function delete($id){
        $user = User::find($id);
        if($user){
            $user->status = "0";
            $user->save();
            return redirect()->route('admin.user')->with('success', 'Berhasil menghapus data user '.$user->name.'.');
        }else{
            return redirect()->route('admin.user')->with('error', 'Tidak menemukan data user');
        }
    }

    public function bulkDelete($ids){
        $ids = explode(',',$ids);
        
        $user = User::whereIn("id", $ids)
        ->update([
            "status" => "0"
        ]);

        if($user){
            return redirect()->route('admin.user')->with('success', 'Berhasil menghapus data user.');
        }else{
            return redirect()->route('admin.user')->with('error', 'Tidak menemukan data user');
        }
    }
}
