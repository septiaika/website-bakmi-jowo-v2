<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // PENGUNJUNG
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('galeri', compact('galeri'));
    }

    // ADMIN DASHBOARD
    public function admin()
    {
        $galeri = Galeri::latest()->get();
        return view('dashboard.galeri', compact('galeri'));
    }

    // TAMBAH FOTO
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $filename);
            $data['foto'] = $filename;
        }

        Galeri::create($data);
        return back()->with('success','Foto galeri berhasil ditambahkan!');
    }

    // EDIT FOTO
    public function edit(Galeri $galeri)
    {
        return view('dashboard.galeri_edit', compact('galeri'));
    }

    // UPDATE FOTO
    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($galeri->foto && file_exists(public_path('images/galeri/'.$galeri->foto))) {
                unlink(public_path('images/galeri/'.$galeri->foto));
            }
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $filename);
            $data['foto'] = $filename;
        }

        $galeri->update($data);
        return redirect()->route('dashboard.galeri.index')->with('success','Foto galeri berhasil diupdate!');
    }

    // HAPUS FOTO
    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto && file_exists(public_path('images/galeri/'.$galeri->foto))) {
            unlink(public_path('images/galeri/'.$galeri->foto));
        }
        $galeri->delete();
        return back()->with('success','Foto galeri berhasil dihapus!');
    }
}
