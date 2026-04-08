@extends('layouts.app')

@section('content')

<style>
/* RESET agar banner benar-benar full-width */
html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

/* ================= BANNER ================= */
.page-banner {
    /* style yang sama seperti sebelumnya */
    height: 550px;
    background:
      linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
      url('{{ asset("images/bg-menu.png") }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 30px;

    /* animasi tambahan */
    opacity: 0;
    animation: fadeInUp 1s ease forwards;
}

/* animasi fadeInUp */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.banner-text {
    text-align: center;
    color: #fff;
}

.banner-text h1 {
    font-size: 38px;
    font-weight: bold;
}

.banner-text p {
    margin-top: 10px;
    color: #eee;
}

/* ===== RESPONSIVE MENU BANNER ===== */
@media (max-width: 1200px){
    .page-banner{
        background-size: contain;
        background-color: #000;
        height: 420px;
    }
}

/* ================= ANIMASI FADE IN UP ================= */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ================= STYLE MENU ================= */

/* Judul menu */
.menu-title {
    text-align: center;
    margin-top: 60px;
}

.menu-title h2 {
    font-weight: bold;
    font-size: 34px;
    color: #8b5e3c;
}

.menu-title p {
    margin-top: 10px;
    color: #666;
}

/* Pilihan kategori menu */
.menu-selector {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin: 40px 0;
}

.menu-btn {
    border: 2px solid #8b5e3c;
    padding: 8px 26px;
    border-radius: 30px;
    font-weight: bold;
    cursor: pointer;
    color: #8b5e3c;
    background: transparent;
    transition: 0.3s;
}

.menu-btn.active,
.menu-btn:hover {
    background: #8b5e3c;
    color: #fff;
}

/* Grid menu */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    margin-bottom: 70px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-in-out;
}

/* Card menu */
.menu-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.menu-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.menu-card img {
    width: 100%;
    height: 230px;
    object-fit: cover;
}

.menu-content {
    padding: 20px;
    text-align: center;
}

.menu-price {
    font-weight: bold;
    color: #8b5e3c;
    margin-bottom: 10px;
}

/* Form order */
.order-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
}

.order-form input {
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ccc;
    text-align: center;
}

.order-form button {
    background: #8b5e3c;
    color: #fff;
    border: none;
    border-radius: 25px;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.order-form button:hover {
    background: #6e4b2f;
    transform: scale(1.05);
}

/* Hidden */
.hidden {
    display: none;
}

/* Animasi fade-in grid saat muncul */
.menu-grid.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div class="page-banner">
    <div class="banner-text">
        <h1>Bakmi Jowo Pak Heri</h1>
        <p>Dimasak dengan Anglo • Cita Rasa Tradisional Jawa</p>
    </div>
</div>

<div class="container">

    {{-- ================= PESAN SUKSES ================= --}}
    @if(session('success'))
    <div style="background:#d4edda;padding:10px;border-radius:8px;margin-bottom:15px;">
        {{ session('success') }}
    </div>
    @endif

    {{-- ================= MENU SECTION ================= --}}
    <div class="menu-title">
        <h2>Menu Kami</h2>
        <p>Nikmati berbagai pilihan hidangan lezat dengan cita rasa autentik</p>
    </div>

    <div class="menu-selector">
        <div class="menu-btn active" onclick="showMenu('makanan', this)">Makanan</div>
        <div class="menu-btn" onclick="showMenu('minuman', this)">Minuman</div>
    </div>

    {{-- MAKANAN --}}
    <div id="makanan" class="menu-grid show">
        @foreach($makanan as $item)
        <div class="menu-card">
            <img src="{{ asset('images/menu/'.$item->foto) }}">
            <div class="menu-content">
                <h3>{{ $item->nama_menu }}</h3>
                <p>{{ $item->deskripsi }}</p>
                <div class="menu-price">Rp{{ number_format($item->harga,0,',','.') }}</div>
                <form action="{{ route('cart.add') }}" method="POST" class="order-form">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $item->id }}">
                    <input type="number" name="quantity" value="0" min="0" required>
                    <button type="submit" class="add-cart-btn">🛒 Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- MINUMAN --}}
    <div id="minuman" class="menu-grid hidden">
        @foreach($minuman as $item)
        <div class="menu-card">
            <img src="{{ asset('images/menu/'.$item->foto) }}">
            <div class="menu-content">
                <h3>{{ $item->nama_menu }}</h3>
                <p>{{ $item->deskripsi }}</p>
                <div class="menu-price">Rp{{ number_format($item->harga,0,',','.') }}</div>
                <form action="{{ route('cart.add') }}" method="POST" class="order-form">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $item->id }}">
                    <input type="number" name="quantity" value="0" min="0" required>
                    <button type="submit" class="add-cart-btn">🛒 Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>

<script>
// ================= SWITCH MENU =================
function showMenu(type, el) {
    document.getElementById('makanan').classList.add('hidden');
    document.getElementById('minuman').classList.add('hidden');
    document.getElementById(type).classList.remove('hidden');

    document.querySelectorAll('.menu-btn').forEach(btn => btn.classList.remove('active'));
    el.classList.add('active');

    // Tambahkan animasi fade-in
    const grid = document.getElementById(type);
    grid.classList.remove('show');
    setTimeout(() => grid.classList.add('show'), 50);
}
</script>

@endsection