@extends('layouts.app') 

@section('content')

<div class="container" style="max-width:900px; margin-top:30px;">

    <!-- Tombol Kembali ke Menu -->
    <div style="margin-bottom:20px;">
        <a href="{{ route('menu') }}" 
           style="background:#8b5e3c; color:#fff; padding:10px 22px; border-radius:30px; text-decoration:none; font-weight:bold; display:inline-block; transition:0.3s;">
           ← Kembali ke Menu
        </a>
    </div>

    <!-- Judul Keranjang -->
    <div style="text-align:center; margin-bottom:25px;">
        <h2 style="color:#8b5e3c; font-size:36px; margin:0; font-weight:bold;">Keranjang</h2>
        <p style="color:#b8865b; font-size:18px; margin-top:5px;">Menu yang Anda Pilih</p>
    </div>

    @php $total = 0; @endphp

    @if($carts->count() > 0)

        @foreach($carts as $cart)
            @php
                $subtotal = $cart->menu->harga * $cart->quantity;
                $total += $subtotal;
            @endphp

            <!-- Card Menu -->
            <div style="display:flex; align-items:center; justify-content:space-between; border:1px solid #ddd; 
                        padding:15px; border-radius:15px; margin-bottom:15px; background:#fff9f2; 
                        box-shadow:0 4px 12px rgba(0,0,0,0.08); transition:transform 0.3s;">
                
                <div style="flex:0 0 120px; margin-right:15px;">
                    <img src="{{ asset('images/menu/'.$cart->menu->foto) }}" 
                         alt="{{ $cart->menu->nama_menu }}" 
                         style="width:100%; height:80px; object-fit:cover; border-radius:12px;">
                </div>

                <div style="flex:1;">
                    <h4 style="margin:0 0 5px 0; color:#8b5e3c;">{{ $cart->menu->nama_menu }}</h4>
                    <p style="margin:0; font-size:14px; color:#555;">
                        Rp{{ number_format($cart->menu->harga,0,',','.') }} x {{ $cart->quantity }} 
                        = Rp{{ number_format($subtotal,0,',','.') }}
                    </p>
                </div>

                <div>
                    <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                style="background:#ff4d4d; border:none; color:#fff; padding:6px 12px; border-radius:10px; cursor:pointer;">
                            ❌
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        <!-- Notifikasi -->
        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <!-- Total & Checkout -->
        <div style="margin-top:25px; text-align:center;">
            <h3 style="color:#8b5e3c; margin-bottom:15px;">
                Total: Rp{{ number_format($total,0,',','.') }}
            </h3>

            <!-- Form Checkout -->
            <form action="{{ route('checkout') }}" method="POST" 
                  style="display:flex; flex-direction:column; align-items:center; gap:12px; width:100%;">
                @csrf

                <!-- Nama -->
                <input type="text" name="nama" placeholder="Masukkan Nama Pemesan" required
                       style="padding:10px 15px; border-radius:25px; border:1px solid #ccc; width:60%; font-size:16px;">

                <!-- Metode Pesanan -->
                <select name="metode" required
                        style="padding:10px 15px; border-radius:25px; border:1px solid #ccc; width:60%; font-size:16px;">
                    <option value="">-- Pilih Metode Pesanan --</option>
                    <option value="Makan di Tempat">Makan di Tempat</option>
                    <option value="Bawa Pulang">Bawa Pulang (Take Away)</option>
                </select>

                <!-- Catatan -->
                <textarea name="catatan" placeholder="Catatan Pesanan (contoh: pedas, tanpa sawi)"
                          style="padding:10px 15px; border-radius:15px; border:1px solid #ccc; width:60%; font-size:15px;"></textarea>

                <!-- Tombol Checkout -->
                <button type="submit" 
                        style="background:#25D366; color:#fff; padding:12px 30px; font-size:18px; border:none; border-radius:30px; font-weight:bold; display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <img src="{{ asset('images/whatsapp.png') }}" alt="WA" style="width:24px; height:24px;">
                    Checkout via WhatsApp
                </button>

            </form>
        </div>

    @else
        <p style="text-align:center; font-size:16px; color:#555;">Keranjang kosong</p>
    @endif

</div>

<style>
.container div[style*="box-shadow"]{
    transition: transform 0.3s, box-shadow 0.3s;
}
.container div[style*="box-shadow"]:hover{
    transform: translateY(-5px);
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}
</style>

@endsection