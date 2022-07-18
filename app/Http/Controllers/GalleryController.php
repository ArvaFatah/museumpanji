<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::where('status', '1')->get();
        return view('auth/gallery/index', [
            'galleries' => $galleries,
        ]);
    }

    public function portalPage(){
        $galleries = Gallery::where('status', '1')->get();
        return view('gallery', [
            'galleries' => $galleries,
        ]);
    }

    public function addPage(){
        return view('auth/gallery/new');
    }

    public function store(Request $request){
        $rules = [
            'judul' => 'required|',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $messages = [
            'judul.required' => 'Judul wajib diisi',
            'foto.required' => 'Foto wajib diisi',
            'foto.image' => 'Foto harus gambar',
            'foto.mimes' => 'Foto harus bertipe: jpeg,png,jpg,gif,svg',
            'foto.max' => 'Foto maksimal 2mb',
        ];

        $request->validate($rules, $messages);

        $gallery = new Gallery;

        if ($request->file('foto')) {
            $imagePath = $request->file('foto');
            $extension = $imagePath->getClientOriginalExtension();
            $imageName = time().'.'.$extension;

            $path = $request->file('foto')->storeAs('uploads', $imageName, 'public');
        }

        $gallery->judul = $request->judul;
        $gallery->keterangan = $request->keterangan;
        $gallery->foto = '/storage/'.$path;
        $gallery->status = 1;
        $save = $gallery->save();

        if($save){
            return redirect()->route('admin.gallery')->with('success', 'Berhasil menambahkan gallery: '.$request->judul);
        }else{
            return redirect()->route('admin.gallery')->with('error', 'Gagal menembahkan user: '.$request->judul);
        }
    }

    public function pageEdit($id){
        $gallery = Gallery::find($id);
        return view('auth.gallery.edit', [
            'gallery' => $gallery
        ]);
    }

    public function postEdit(Request $request, $id){
        $rules = [
            'judul' => 'required|',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $messages = [
            'judul.required' => 'Judul wajib diisi',
            'foto.image' => 'Foto harus gambar',
            'foto.mimes' => 'Foto harus bertipe: jpeg,png,jpg,gif,svg',
            'foto.max' => 'Foto maksimal 2mb',
        ];

        $request->validate($rules, $messages);

        $gallery = Gallery::find($id);

        if ($request->file('foto')) {
            $imagePath = $request->file('foto');
            $extension = $imagePath->getClientOriginalExtension();
            $imageName = time().'.'.$extension;

            $path = $request->file('foto')->storeAs('uploads', $imageName, 'public');

            $gallery->foto = '/storage/'.$path;
        }

        if($gallery){
            $gallery->judul = $request->judul;
            $gallery->keterangan = $request->keterangan;
            $gallery->save();
            return redirect()->route('admin.gallery')->with('success', 'Berhasil menubah data gallery '.$request->judul);
        }else{
            return redirect()->route('admin.gallery')->with('error', 'Tidak menemukan data gallery');
        }
    }

    public function delete($id){
        $gallery = Gallery::find($id);
        if($gallery){
            $gallery->status = 0;
            $gallery->save();
            return redirect()->route('admin.gallery')->with('success', 'Berhasil menghapus data gallery "'.$gallery->judul.'".');
        }else{
            return redirect()->route('admin.gallery')->with('error', 'Tidak menemukan data gallery');
        }
    }
}
