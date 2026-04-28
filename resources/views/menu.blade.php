@extends('layouts.app')

@section('content')

<style>
html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

/* ================= BANNER ================= */
.page-banner {
    height: 550px;
    background:
      linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
      url('{{ asset("images/bg-menu.png") }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 30px;
    opacity: 0;
    animation: fadeInUp 1s ease forwards;
}

@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

.banner-text { text-align: center; color: #fff; }
.banner-text h1 { font-size: 38px; font-weight: bold; }
.banner-text p { margin-top: 10px; color: #eee; }

/* ================= MENU ================= */
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

/* ================= MENU GRID ================= */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    margin-bottom: 70px;
    opacity: 0;
    transform: translateY(15px);
    transition: all 0.4s ease-in-out;
}

.menu-grid.show {
    opacity: 1;
    transform: translateY(0);
}

/* ================= CARD ================= */
.menu-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.menu-card:hover {
    transform: translateY(-6px) scale(1.02);
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

/* ================= FORM ================= */
.order-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
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
}

/* ================= FAQ ================= */
.faq-box{
    max-width:800px;
    margin:auto;
}

.faq-item{
    background:#fff;
    border-radius:14px;
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
    margin-bottom:15px;
    overflow:hidden;
    cursor:pointer;
    border-left:4px solid #8b5e3c;
    transition:.25s;
}

.faq-item:hover{
    transform:translateY(-2px);
}

.faq-question{
    padding:18px;
    font-weight:bold;
    color:#8b5e3c;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.arrow{
    font-size:18px;
    color:#d4af37;
    transition:.3s;
}

.faq-answer{
    padding:0 18px 18px;
    display:none;
    color:#333;
}

.faq-answer ol{
    margin:0;
    padding-left:18px;
}

.faq-item.active .faq-answer{
    display:block;
}

.faq-item.active .arrow{
    transform:rotate(180deg);
    color:#8b5e3c;
}

/* ================= MODAL FIX ================= */
.modal-qty{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}

.modal-qty.show{
    display:flex;
}

.modal-box{
    background:#fff;
    padding:25px;
    border-radius:15px;
    text-align:center;
    width:280px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.modal-box h3{
    color:#8b5e3c;
    margin-bottom:10px;
}

.modal-box p{
    color:#333;
    margin-bottom:20px;
}

.modal-box button{
    background:#8b5e3c;
    color:#fff;
    border:none;
    padding:8px 20px;
    border-radius:20px;
    cursor:pointer;
}

/* hidden helper */
.hidden{
    display:none !important;
}
</style>

<div class="page-banner">
    <div class="banner-text">
        <h1>Bakmi Jowo Pak Heri</h1>
        <p>Dimasak dengan Anglo • Cita Rasa Tradisional Jawa</p>
    </div>
</div>

<div class="container">

@if(session('success'))
<div style="background:#d4edda;padding:10px;border-radius:8px;margin-bottom:15px;">
    {{ session('success') }}
</div>
@endif

<!-- FAQ -->
<div class="container my-5">
    <div class="text-center mb-4">
        <h2 style="color:#8b5e3c;font-weight:bold;">❓ Cara Pemesanan</h2>
        <p style="color:#666;">Klik untuk melihat langkah pemesanan</p>
    </div>

    <div class="faq-box">
        <div class="faq-item" onclick="toggleFaq(this)">
            <div class="faq-question">
                Bagaimana cara memesan di Bakmi Jowo Pak Heri?
                <span class="arrow">▼</span>
            </div>

            <div class="faq-answer">
                <ol>
                    <li>Pilih menu</li>
                    <li>Tentukan jumlah (minimal 1)</li>
                    <li>Klik keranjang</li>
                    <li>Isi data</li>
                    <li>Checkout WA</li>
                    <li>Pesanan diproses</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- MENU -->
<div class="menu-title">
    <h2>Menu Kami</h2>
    <p>Nikmati berbagai pilihan hidangan lezat</p>
</div>

<div class="menu-selector">
    <div class="menu-btn active" onclick="showMenu('makanan', this)">Makanan</div>
    <div class="menu-btn" onclick="showMenu('minuman', this)">Minuman</div>
</div>

<!-- MAKANAN -->
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
            <input type="number" name="quantity" value="0" min="0">
            <button type="submit">🛒 Keranjang</button>
        </form>
    </div>
</div>
@endforeach
</div>

<!-- MINUMAN (tetap terpisah) -->
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
            <input type="number" name="quantity" value="0" min="0">
            <button type="submit">🛒 Keranjang</button>
        </form>
    </div>
</div>
@endforeach
</div>

</div>

<!-- MODAL -->
<div id="qtyModal" class="modal-qty">
    <div class="modal-box">
        <h3>⚠️ Peringatan</h3>
        <p>Jumlah tidak boleh 0, minimal 1 ya!</p>
        <button onclick="closeModal()">OK</button>
    </div>
</div>

<script>
function showMenu(type, el){
    document.getElementById('makanan').classList.add('hidden');
    document.getElementById('minuman').classList.add('hidden');
    document.getElementById(type).classList.remove('hidden');

    document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active'));
    el.classList.add('active');

    let grid = document.getElementById(type);
    grid.classList.remove('show');
    setTimeout(() => grid.classList.add('show'), 50);
}

/* MODAL FIX */
function showModal(){
    document.getElementById('qtyModal').classList.add('show');
}

function closeModal(){
    document.getElementById('qtyModal').classList.remove('show');
}

/* VALIDASI */
document.querySelectorAll('.order-form').forEach(form => {
    form.addEventListener('submit', function(e){
        let qty = parseInt(form.querySelector('input[name="quantity"]').value);

        if(!qty || qty <= 0){
            e.preventDefault();
            showModal();
        }
    });
});

function toggleFaq(el){
    el.classList.toggle('active');
}
</script>

@endsection