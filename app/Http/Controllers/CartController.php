<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    // 🔹 HALAMAN CART
    public function index()
    {
        $sessionId = session()->getId();

        $carts = Cart::with('menu')
            ->where('session_id', $sessionId)
            ->get();

        return view('cart', compact('carts'));
    }

    // 🔹 TAMBAH ITEM KE CART
    public function add(Request $request)
    {
        $request->validate([
            'menu_id'  => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $sessionId = session()->getId();

        $cart = Cart::where('menu_id', $request->menu_id)
            ->where('session_id', $sessionId)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'menu_id'    => $request->menu_id,
                'quantity'   => $request->quantity,
                'session_id' => $sessionId
            ]);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Berhasil ditambahkan ke keranjang');
    }

    // 🔹 HAPUS ITEM DARI CART
    public function delete($id)
    {
        $sessionId = session()->getId();

        Cart::where('id', $id)
            ->where('session_id', $sessionId)
            ->delete();

        return back()->with('success', 'Item dihapus dari keranjang');
    }

    // 🔹 CHECKOUT
    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'metode' => 'required'
        ]);

        $sessionId = session()->getId();

        $carts = Cart::with('menu')
            ->where('session_id', $sessionId)
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('success','Keranjang masih kosong');
        }

        $total = 0;
        $menuList = "";
        $detail = "";
        $no = 1;

        foreach ($carts as $cart) {

            $subtotal = $cart->menu->harga * $cart->quantity;
            $total += $subtotal;

            $menuList .= $no.". ".$cart->menu->nama_menu
                        ." x ".$cart->quantity
                        ." x ".number_format($cart->menu->harga,0,',','.')
                        ."%0A";

            $detail .= $cart->menu->nama_menu
                        ." x ".$cart->quantity
                        ." = Rp".number_format($subtotal,0,',','.')
                        ."\n";

            $no++;
        }

        // 🔹 SIMPAN KE DATABASE (orders)
        Order::create([
            'nama' => $request->nama,
            'total' => $total,
            'detail_pesanan' => $detail
        ]);

        // 🔹 TEMPLATE PESAN WHATSAPP
        $pesan  = "*PESANAN ATAS NAMA* : ".$request->nama."%0A";
        $pesan .= "*METODE* : ".$request->metode."%0A";
        $pesan .= "*TOTAL* : Rp".number_format($total,0,',','.')."%0A%0A";

        $pesan .= "*MENU* :%0A";
        $pesan .= $menuList."%0A";

        $pesan .= "*CATATAN* : ".($request->catatan ?? "-");

        $wa = "6281901227343";

        $url = "https://wa.me/".$wa."?text=".$pesan;

        // 🔹 KOSONGKAN CART
        Cart::where('session_id',$sessionId)->delete();

        // 🔹 HALAMAN SUKSES
        return redirect()->route('order.success')
            ->with('wa_link',$url);
    }
}