<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminUlasanController extends Controller
{
    // Tampilkan semua ulasan
    public function index()
    {
        $ulasans = Testimoni::latest()->get();
        return view('dashboard.ulasan.index', compact('ulasans'));
    }

    // Tampilkan halaman edit
    public function edit($id)
    {
        $ulasan = Testimoni::findOrFail($id);
        return view('dashboard.ulasan.edit', compact('ulasan'));
    }

    // Update ulasan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $ulasan = Testimoni::findOrFail($id);

        $ulasan->update([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'rating' => $request->rating,
            'balasan' => $request->balasan,
            
        ]);

        return redirect()->route('dashboard.ulasan')
            ->with('success', 'Ulasan berhasil diperbarui!');
    }

    // Hapus ulasan
    public function destroy($id)
    {
        $ulasan = Testimoni::findOrFail($id);
        $ulasan->delete();

        return redirect()->back()
            ->with('success', 'Ulasan berhasil dihapus');
    }
}
