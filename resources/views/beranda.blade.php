@extends('layouts.app')

@section('content')

<style>
/* ===== BANNER ===== */
.banner{
    height:700px;
    background:url('{{ asset("images/banner2.png") }}') center/cover no-repeat;
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
.gambar-utama{padding:45px 15px}
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
    padding:45px 10px;
}

.video-box{
    background:#111;
    max-width:750px;
    margin:auto;
    padding:40px;
    border-radius:20px;
    border:2px solid #a4712a;
    box-shadow:0 15px 40px rgba(0,0,0,.6);
    position:relative;
    transition:.3s;
}

.video-box:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 50px rgba(164,113,42,.4);
}

.video-box h2{
    color:#fff;
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
.katalog{padding:45px 10px}
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
.kartu-produk {
    position: relative;
    overflow: hidden;
}

.kartu-produk img {
    width: 100%;
    display: block;
}

.kartu-produk {
    text-align: center;
}

.overlay {
    position: static; /* ini kunci utama */
    transform: none;
    background: none;
    padding: 10px 0;
    color: #fff; /* sesuaikan dengan background */
    opacity: 1;
    padding: 15px;
    border-radius: 10px;

    opacity: 1; /* INI bikin selalu muncul */
}
.overlay h3 {
    font-size: 16px; /* kecilin judul */
    margin-bottom: 5px;
}

.overlay p {
    font-size: 13px; /* kecilin deskripsi */
    line-height: 1.4;
}

/* kalau sebelumnya ada hover, hapus atau matikan */
.kartu-produk:hover .overlay {
    opacity: 1;
}

/* ===== KENAPA MEMILIH KAMI ===== */
.kenapa-section{
    padding:55px 20px;
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
    padding:55px 20px;
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
    <h2>Keunggulan</h2>
    <div class="katalog-grid">
        <!-- Kartu 1 -->
        <div class="kartu-produk">
            <img src="{{ asset('images/foto1.png') }}" alt="Teknik Memasak">
            <div class="overlay">
                <h3>Teknik Memasak</h3>
                <p>Dimasak menggunakan anglo dan arang untuk menjaga cita rasa autentik.</p>
            </div>
        </div>

        <!-- Kartu 2 -->
        <div class="kartu-produk">
            <img src="{{ asset('images/foto2.png') }}" alt="Bumbu Khas">
            <div class="overlay">
                <h3>Konsistensi Rasa</h3>
                <p>Resep rahasia dengan bumbu khas yang diwariskan secara turun-temurun.</p>
            </div>
        </div>

        <!-- Kartu 3 -->
        <div class="kartu-produk">
            <img src="{{ asset('images/foto3.jpg') }}" alt="Cita Rasa Autentik">
            <div class="overlay">
                <h3>Lebih dari 1 dekade menjaga cita rasa</h3>
                <p>dari tahun 2012 menjaga rasa bakmi Jawa tetap autentik dan konsisten.</p>
            </div>
        </div>
    </div>
</div>

<section class="kenapa-section anim-scroll">
    <h2>Kenapa Memilih Kami?</h2>
    <div class="kenapa-grid">
        <div class="kenapa-item">
            <i class="fas fa-fire"></i>
            <h4>Standar Kebersihan</h4>
            <p>Proses memasak dan penyajian selalu menjaga standar kebersihan.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-leaf"></i>
            <h4>Harga Terjangkau</h4>
            <p>Rasa premium tanpa harus mahal cocok untuk semua kalangan.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-heart"></i>
            <h4>Tanpa Pengawet</h4>
            <p>Semua makanan dibuat fresh tanpa bahan pengawet.</p>
        </div>
        <div class="kenapa-item">
            <i class="fas fa-star"></i>
            <h4>Pelayanan Cepat & Ramah</h4>
            <p>Kami mengutamakan kepuasan pelanggan dengan pelayanan yang responsif.</p>
        </div>
    </div>
</section>

{{-- ===== SECTION TESTIMONI FINAL ===== --}}
<section class="testimoni-section anim-scroll">
    <h2>Apa Kata Pelanggan Kami?</h2>

    {{-- 3 testimoni terbaru dari database --}}
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

    {{-- rating rata-rata dari database --}}
    <div style="max-width:700px; margin:50px auto 0; text-align:center;">
        <h3 style="color:#fff; margin-bottom:10px;">Rating Pelanggan</h3>
        <div style="font-size:28px; color:#c9a26d; margin-bottom:10px;">
            {{ number_format($rating ?? 0,1) }}/5
        </div>
        <p style="color:#ccc; line-height:1.8;">
            Rating ini merupakan rata-rata penilaian pelanggan berdasarkan ulasan
            yang diberikan langsung melalui website Bakmi Jowo Pak Heri.
        </p>
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