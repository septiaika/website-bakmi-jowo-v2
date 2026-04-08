@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<!-- ================= BANNER ================= -->
<div class="page-banner">
    <div class="banner-text">
        <h1>Galeri Kami</h1>
        <p>Momen & Suasana Hangat Bakmi Jowo Pak Heri</p>
    </div>
</div>

<div class="container">

<style>

/* ================= BANNER (SAMA MENU) ================= */
.page-banner {
    height: 600px;
    background:
        linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
        url('{{ asset("images/bg-galeri.png") }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 30px;
    border-radius: 25px;
    overflow: hidden;
    opacity: 0;
    transform: scale(1.05);
    transition: 1.2s ease;
}
.page-banner.show {
    opacity: 1;
    transform: scale(1);
}

/* ===== RESPONSIVE PAGE BANNER ===== */
@media (max-width: 1200px){
    .page-banner{
        background-size: contain;
        background-color: #000;
        height: 450px;
    }
}

.banner-text{
    text-align:center;
    color:#fff;
}
.banner-text h1{
    font-size:42px;
    font-weight:800;
}
.banner-text p{
    margin-top:12px;
    font-size:18px;
    color:#eee;
}

/* ================= TITLE (SAMA MENU) ================= */
.galeri-title{
    text-align:center;
    margin:70px 0;
}
.galeri-title h2{
    font-weight:800;
    font-size:36px;
    color:#8b5e3c;
}
.galeri-title p{
    margin-top:12px;
    color:#666;
    font-size:15px;
}

/* ================= GRID (SAMA MENU) ================= */
.galeri-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:35px;
    margin-bottom:120px;
}

/* ================= CARD (SAMA MENU) ================= */
.galeri-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
    transition:.35s;
    opacity:0;
    transform:translateY(50px);
}
.galeri-card.show{
    opacity:1;
    transform:translateY(0);
}
.galeri-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

.galeri-card img{
    width:100%;
    height:240px;
    object-fit:cover;
    transition:.4s;
}
.galeri-card:hover img{
    transform:scale(1.08);
}

/* ================= CONTENT (SAMA MENU) ================= */
.galeri-content{
    padding:22px;
    text-align:center;
}
.galeri-content h3{
    font-weight:bold;
    color:#000;
}
.galeri-content p{
    color:#555;
    font-size:14px;
    line-height:1.6;
}

.readmore{
    display:inline-block;
    margin-top:10px;
    color:#8b5e3c;
    font-weight:bold;
    cursor:pointer;
}

</style>

<!-- ================= TITLE ================= -->
<div class="galeri-title">
    <h2>Galeri</h2>
    <p>Lihat suasana dan momen terbaik dari pelanggan kami</p>
</div>

<!-- ================= GALERI DATABASE ================= -->
<div class="galeri-grid">
@foreach($galeri as $item)
    <div class="galeri-card">
        <img src="{{ asset('images/galeri/'.$item->foto) }}" alt="{{ $item->judul }}">
        <div class="galeri-content">

            <h3>{{ $item->judul }}</h3>

            <p class="short">
                {{ Str::limit($item->deskripsi, 120) }}
            </p>

            <p class="full" style="display:none;">
                {{ $item->deskripsi }}
            </p>

            @if(strlen($item->deskripsi) > 120)
                <span class="readmore">Read More</span>
            @endif

        </div>
    </div>
@endforeach
</div>

</div>

<script>
window.onload=()=>{
    document.querySelector('.page-banner').classList.add('show');
    revealCards();
};

window.addEventListener('scroll',revealCards);

function revealCards(){
    document.querySelectorAll('.galeri-card').forEach((el,i)=>{
        if(el.getBoundingClientRect().top < window.innerHeight-80){
            setTimeout(()=>{
                el.classList.add('show');
            },i*80);
        }
    });
}

document.addEventListener("DOMContentLoaded",function(){
    document.querySelectorAll('.readmore').forEach(btn=>{
        btn.addEventListener('click',function(){
            const parent=this.closest('.galeri-content');
            const shortText=parent.querySelector('.short');
            const fullText=parent.querySelector('.full');

            if(fullText.style.display==='none'){
                shortText.style.display='none';
                fullText.style.display='block';
                this.innerText='Read Less';
            }else{
                shortText.style.display='block';
                fullText.style.display='none';
                this.innerText='Read More';
            }
        });
    });
});
</script>

@endsection
