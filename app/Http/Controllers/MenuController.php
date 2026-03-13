<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Testimoni;
use App\Models\Cart;

class MenuController extends Controller
{
    // ================= PENGUNJUNG =================

    // Halaman Menu (Pengunjung)

public function index()
{
    $makanan = Menu::where('kategori','makanan')->get();
    $minuman = Menu::where('kategori','minuman')->get();

    $sessionId = session()->getId();

    $carts = Cart::with('menu')
                ->where('session_id', $sessionId)
                ->get();

    return view('menu', compact('makanan','minuman','carts'));
}
    // Halaman Beranda (Pengunjung)
    public function beranda()
    {
        $menus      = Menu::latest()->take(6)->get();
        $testimonis = Testimoni::latest()->take(3)->get();

        return view('beranda', compact('menus', 'testimonis'));
    }


    // ================= ADMIN =================

    // Halaman Menu Admin
    public function adminIndex()
    {
        $menu = Menu::all();
        return view('dashboard.menu', compact('menu'));
    }

    // Simpan Menu Baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|in:makanan,minuman',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            $fileName = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/menu'), $fileName);

            $data['foto'] = $fileName;
        }

        Menu::create($data);

        return redirect()
            ->route('dashboard.menu.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    // Edit Menu
    public function edit(Menu $menu)
    {
        return view('dashboard.menu-edit', compact('menu'));
    }

    // Update Menu
    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|in:makanan,minuman',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($menu->foto && file_exists(public_path('images/menu/'.$menu->foto))) {
                unlink(public_path('images/menu/'.$menu->foto));
            }

            $fileName = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/menu'), $fileName);

            $data['foto'] = $fileName;
        }

        $menu->update($data);

        return redirect()
            ->route('dashboard.menu.index')
            ->with('success', 'Menu berhasil diupdate!');
    }

    // Hapus Menu
    public function destroy(Menu $menu)
    {
        if ($menu->foto && file_exists(public_path('images/menu/'.$menu->foto))) {
            unlink(public_path('images/menu/'.$menu->foto));
        }

        $menu->delete();

        return redirect()
            ->route('dashboard.menu.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}