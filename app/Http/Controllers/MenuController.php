<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Testimoni;
use App\Models\Cart;

class MenuController extends Controller
{
    // ================= PENGUNJUNG =================

public function index(Request $request)
{
    $search = strtolower($request->search);

    // ===== ROUTING SEARCH =====
    if ($search) {

        if (str_contains($search, 'wa') || str_contains($search, 'kontak')) {
            return redirect('https://wa.me/6281901227343');
        }

        if (str_contains($search, 'instagram') || str_contains($search, 'ig')) {
            return redirect('https://instagram.com/bakmijowo_pakheri');
        }

        if (str_contains($search, 'tiktok')) {
            return redirect('https://www.tiktok.com/@bakmijowo_officia');
        }

        if (str_contains($search, 'sejarah') || str_contains($search, 'profil')) {
            return redirect('/profil');
        }

        if (str_contains($search, 'faq')) {
            return redirect('/beranda'); 
        }
    }
    // ===== MENU SEARCH =====
    $makanan = Menu::where('kategori','makanan')
        ->when($search, function($query) use ($search){
            $query->where('nama_menu', 'like', '%'.$search.'%');
        })->get();

    $minuman = Menu::where('kategori','minuman')
        ->when($search, function($query) use ($search){
            $query->where('nama_menu', 'like', '%'.$search.'%');
        })->get();

    $pages = [];
    
    $notFound = false;

    if ($search) {
        if (
            $makanan->isEmpty() &&
            $minuman->isEmpty() &&
            empty($pages)
        ) {
            $notFound = true;
        }
    }

    // 3. RETURN VIEW
    return view('menu', compact(
        'makanan',
        'minuman',
        'pages',
        'search',
        'notFound'
    ));
}
    public function beranda()
    {
        $testimonis = Testimoni::latest()->take(3)->get();
        $rating = Testimoni::avg('rating');

        return view('beranda', compact('testimonis', 'rating'));
    }

    // ================= ADMIN =================

    public function adminIndex()
    {
        $menu = Menu::all();
        return view('dashboard.menu', compact('menu'));
    }

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

        return back()->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(Menu $menu)
    {
        return view('dashboard.menu-edit', compact('menu'));
    }

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

    // ================= SOFT DELETE =================

   public function destroy($id)
{
    $menu = Menu::findOrFail($id);
    $menu->delete();

    return redirect()->back()->with('success', 'Menu masuk trash');
}

    public function trash()
    {
        $menu = Menu::onlyTrashed()->get();

        return view('dashboard.menu-trash', compact('menu'));
    }

    public function restore($id)
    {
        Menu::withTrashed()
            ->findOrFail($id)
            ->restore();

        return back()->with('success', 'Menu berhasil dikembalikan');
    }
}