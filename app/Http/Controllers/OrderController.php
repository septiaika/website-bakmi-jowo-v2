<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $sessionId = session()->getId();

        $carts = Cart::with('menu')
                    ->where('session_id', $sessionId)
                    ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        $total = 0;
        $detail = "";

        foreach ($carts as $cart) {
            $subtotal = $cart->menu->harga * $cart->quantity;
            $total += $subtotal;

            $detail .= $cart->menu->nama_menu .
                       " x" . $cart->quantity .
                       " = Rp" . number_format($subtotal,0,',','.') . "\n";
        }

        Order::create([
            'nama' => $request->nama,
            'total' => $total,
            'detail_pesanan' => $detail
        ]);

        Cart::where('session_id', $sessionId)->delete();

        return redirect()->route('menu')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}