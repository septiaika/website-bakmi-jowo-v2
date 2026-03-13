@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h3>{{ $menu->nama_menu }}</h3>

    <img src="{{ asset('images/menu/'.$menu->foto) }}" width="300">

    <p>{{ $menu->deskripsi }}</p>

    <h4>Rp {{ number_format($menu->harga,0,',','.') }}</h4>

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit" class="btn btn-success">
            Tambah ke Keranjang
        </button>
    </form>

    <br>
    <a href="{{ route('menu.index') }}">← Kembali ke Menu</a>

</div>

@endsection