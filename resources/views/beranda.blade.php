@extends('layouts.app')

@section('content')

<style>
/* ===== BANNER ===== */
.banner{
    height:700px;
    background:url('{{ asset("images/banner.png") }}') center/cover no-repeat;
    opacity:0;
    transform:translateY(-60px);
    transition:1.2s ease;
}
.banner.muncul{opacity:1;transform:none}

/* ===== SCROLL ANIMATION ===== */
.anim-scroll{
    opacity:0;
    transform:translateY(80px);
    transition:1s ease;
}
.anim-scroll.show{opacity:1;transform:none}

/* ===== SAPAAN ===== */
.gambar-utama{padding:80px 15px}
.wrapper-gambar{
    max-width:900px;
    margin:auto;
    display:flex;
    gap:30px;
    align-items:center;
    justify-content:center;
}
.gambar img{width:180px;border-radius:10px}
.teks{color:#fff;line-height:1.7;text-align:justify}

/* ===== VIDEO ===== */
.section-video{
    text-align:center;
    padding:60px 10px;
}

.video-box{
    background:#111; /* hitam elegan */
    max-width:750px;
    margin:auto;
    padding:40px;
    border-radius:20px;
    border:2px solid #a4712a; /* gold */
    box-shadow:0 15px 40px rgba(0,0,0,.6);
    position:relative;
    transition:.3s;
}

.video-box:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 50px rgba(164,113,42,.4);
}

.video-box h2{
    color:#fff; /* gold */
    margin-bottom:20px;
}

.video-box p{
    color:#ccc;
    margin-bottom:20px;
}

video{
    width:100%;
    max-width:600px;
    border-radius:16px;
    border:2px solid #a4712a;
    box-shadow:0 10px 25px rgba(0,0,0,.6);
}

/* ===== KATALOG ===== */
.katalog{padding:60px 10px}
.katalog h2{text-align:center;color:#fff;margin-bottom:40px}
.katalog-grid{
    max-width:1000px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:30px;
}
.kartu-produk img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:12px;
}

/* ===== KENAPA MEMILIH KAMI (MODERN) ===== */
/* ===== KENAPA MEMILIH KAMI (SIMPLE & SEJAJAR 4) ===== */
.kenapa-section{
    padding:100px 20px;
    text-align:center;
    background:transparent;
}

.kenapa-section h2{
    font-size:36px;
    font-weight:bold;
    margin-bottom:60px;
    color:#fff;
}

.kenapa-grid{
    max-width:1100px;
    margin:auto;
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:40px;
    flex-wrap:wrap;
}

.kenapa-item{
    flex:1;
    min-width:220px;
}

.kenapa-item i{
    font-size:45px;
    margin-bottom:20px;
    color:#c9a26d;
    transition:0.3s;
}

.kenapa-item:hover i{
    transform:scale(1.2);
    text-shadow:0 0 15px rgba(201,162,109,0.8);
}

.kenapa-item h4{
    font-size:20px;
    font-weight:bold;
    margin-bottom:15px;
    color:#fff;
}

.kenapa-item p{
    font-size:14px;
    color:#ccc;
    line-height:1.6;
}

/* ===== TESTIMONI ===== */
.testimoni-section{
    padding:100px 20px;
    text-align:center;
    background:#000;
}
.testimoni-section h2{
    font-size:34px;
    margin-bottom:60px;
    color:#fff;
}
.testimoni-grid{
    max-width:1100px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:30px;
}
.testimoni-item{
    background:#111;
    padding:30px;
    border-radius:20px;
    border:1px solid rgba(201,162,109,0.2);
    transition:0.3s ease;
}
.testimoni-item:hover{
    transform:translateY(-8px);
    box-shadow:0 0 20px rgba(201,162,109,0.5);
}
.rating{
    color:#c9a26d;
    margin-bottom:15px;
    font-size:18px;
}
.testimoni-text{
    font-style:italic;
    color:#ddd;
    margin-bottom:15px;
}
.sumber{
    font-size:14px;
    color:#999;
}
.btn-google{
    display:inline-block;
    margin-top:50px;
    padding:14px 30px;
    background:#c9a26d;
    color:#000;
    font-weight:bold;
    border-radius:40px;
    text-decoration:none;
    transition:0.3s;
}
.btn-google:hover{
    background:#fff;
    color:#000;
}
</style>

<div class="banner"></div>

<div class="gambar-utama anim-scroll">
    <div class="wrapper-gambar">
        <div class="gambar">
            <img src="{{ asset('images/sapa.png') }}">
        </div>
        <div class="teks">
            Selamat Datang di Bakmi Jowo Pak Heri.
            Kami menyajikan bakmi Jawa autentik dengan cita rasa khas tradisional yang dimasak menggunakan resep turun-temurun.
            Setiap hidangan dibuat dengan bahan berkualitas dan penuh kehangatan.
        </div>
    </div>
</div>

<div class="section-video anim-scroll">
    <div class="video-box">
        <h2>Cerita di Balik Cita Rasa</h2>
        <video controls>
            <source src="{{ asset('videos/cerita.mp4') }}">
        </video>
    </div>
</div>

<div class="katalog anim-scroll">
    <h2>Katalog Produk</h2>
    <div class="katalog-grid">
        @foreach($menus as $menu)
            <div class="kartu-produk">
                <img src="{{ asset('images/menu/'.$menu->foto) }}">
            </div>
        @endforeach
    </div>
</div>

<section class="kenapa-section anim-scroll">
    <h2>Kenapa Memilih Kami?</h2>
    <div class="kenapa-grid">
        <div class="kenapa-item">
            <i class="fas fa-fire"></i>
            <h4>Masak Tradisional</h4>
            <p>Dimasak menggunakan anglo dan arang untuk menjaga cita rasa autentik.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-leaf"></i>
            <h4>Bahan Berkualitas</h4>
            <p>Menggunakan bahan segar pilihan terbaik.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-heart"></i>
            <h4>Penuh Kehangatan</h4>
            <p>Dibuat dengan sepenuh hati untuk pelanggan.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-star"></i>
            <h4>Rasa Terjamin</h4>
            <p>Resep turun-temurun dengan rasa konsisten.</p>
        </div>
    </div>
</section>

<section class="testimoni-section anim-scroll">

    <h2>Apa Kata Pelanggan Kami?</h2>

    <div class="testimoni-grid">
        @forelse($testimonis as $t)
            <div class="testimoni-item">

                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $t->rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>

                <div class="testimoni-text">
                    "{{ $t->pesan }}"
                </div>

                <div class="sumber">
                    - {{ $t->nama }}
                </div>

            </div>
        @empty
            <p style="color:#ccc;">Belum ada ulasan.</p>
        @endforelse
    </div>

    <a href="https://maps.app.goo.gl/uG21c2jAjzSs6tMZ9" 
       target="_blank" 
       class="btn-google">
        Lihat Ulasan Lengkap di Google Maps
    </a>

</section>

<script>
window.onload=()=>document.querySelector('.banner').classList.add('muncul');
window.addEventListener('scroll',()=>{
    document.querySelectorAll('.anim-scroll').forEach(el=>{
        if(el.getBoundingClientRect().top < innerHeight-120){
            el.classList.add('show')
        }
    })
});
</script>

@endsection
