@extends('layouts.app')

@section('content')

<style>
/* RESET */
html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* hindari scroll horizontal */
}

/* ================= BANNER ================= */
.kontak-banner {
    position: relative;
    height: 750px;
    background:
        linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
        url('{{ asset("images/banner-kontak.png") }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    margin-bottom: 60px;
}

.kontak-banner h1 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 10px;
}

.kontak-banner p {
    font-size: 18px;
    opacity: .95;
}

/* ================= KONTAK ================= */
.kontak-section {
    padding-bottom: 60px;
}

.kontak-box {
    background: #fff;
    border-radius: 18px;
    padding: 45px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    height: 100%;
}

/* JUDUL */
.kontak-judul {
    font-size: 26px;
    font-weight: 800;
    color: #111;
    margin-bottom: 10px;
}

.kontak-judul::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background: #000;
    margin-top: 8px;
    border-radius: 2px;
}

.kontak-sub {
    font-size: 16px;
    color: #333;
    margin-bottom: 30px;
}

/* ITEM */
.kontak-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 22px;
    transition: .3s;
}

.kontak-item:hover {
    transform: translateX(6px);
}

.kontak-item:hover .kontak-icon {
    background: #333;
}

.kontak-icon {
    min-width: 60px;
    height: 60px;
    background: #000;
    color: #fff;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    margin-right: 18px;
}

.kontak-text h5 {
    font-size: 17px;
    font-weight: 700;
    color: #000;
    margin-bottom: 5px;
}

.kontak-text p {
    font-size: 15px;
    color: #222;
    margin: 0;
    line-height: 1.6;
}

a.text-dark {
    color: #000 !important;
}

/* FORM */
.kontak-box .form-label {
    font-size: 14px;
    font-weight: 600;
    color: #111;
}

.kontak-box .form-control,
.kontak-box .form-select {
    padding: 12px;
    border-radius: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    color: #000;
    background: #fff;
}

.kontak-box .form-control:focus,
.kontak-box .form-select:focus {
    box-shadow: none;
    border-color: #000;
}

.btn-kirim {
    background: #000;
    color: #fff;
    padding: 13px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 15px;
    border: none;
    transition: .3s;
    cursor: pointer;
}

.btn-kirim:hover {
    background: #222;
}

/* MAPS */
.container-fluid.px-0 {
    padding-left: 0 !important;
    padding-right: 0 !important;
}

iframe {
    display: block;
    width: 100%;
    height: 380px;
    border: 0;
}

/* ================= SCROLL ANIMATION ================= */
.reveal {
    opacity: 0;
    transform: translateY(60px);
    transition: all 1s ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

.reveal-left {
    transform: translateX(-80px);
}

.reveal-right {
    transform: translateX(80px);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .kontak-banner h1 {
        font-size: 30px;
    }

    .kontak-box {
        padding: 30px;
    }
}

/*--------------------RATING---------------*/
.rating-stars {
    font-size: 30px;
    cursor: pointer;
    user-select: none;
}

.star {
    color: #ccc;
    transition: 0.2s;
}

.star.hovered,
.star.selected {
    color: #f4b400;
}
</style>

<!-- ================= BANNER ================= -->
<div class="kontak-banner reveal">
    <div>
        <h1>Hubungi Kami</h1>
        <p>Kami siap melayani pemesanan dan pertanyaan Anda</p>
    </div>
</div>

<!-- ================= KONTAK ================= -->
<div class="container kontak-section">
    <div class="row g-4">

        <!-- KIRI -->
        <div class="col-lg-5 reveal reveal-left">
            <div class="kontak-box">

                <h3 class="kontak-judul">Informasi Kontak</h3>
                <p class="kontak-sub">Hubungi kami melalui informasi berikut</p>

                <!-- WHATSAPP -->
                <a href="https://wa.me/6281901227343" target="_blank" class="text-decoration-none text-dark">
                    <div class="kontak-item">
                        <div class="kontak-icon"><i class="bi bi-whatsapp"></i></div>
                        <div class="kontak-text">
                            <h5>WhatsApp</h5>
                            <p>+62 819-0122-7343</p>
                        </div>
                    </div>
                </a>

                <!-- INSTAGRAM -->
                <a href="https://www.instagram.com/bakmijowo_official?igsh=MW9xd29rbG9iYzZjbA==" target="_blank" class="text-decoration-none text-dark">
                    <div class="kontak-item">
                        <div class="kontak-icon"><i class="bi bi-instagram"></i></div>
                        <div class="kontak-text">
                            <h5>Instagram</h5>
                            <p>@bakmijowo_pakheri</p>
                        </div>
                    </div>
                </a>

                <!-- FACEBOOK -->
                <a href="https://www.facebook.com/share/1CA5jLDTnJ/" target="_blank" class="text-decoration-none text-dark">
                    <div class="kontak-item">
                        <div class="kontak-icon"><i class="bi bi-facebook"></i></div>
                        <div class="kontak-text">
                            <h5>Facebook</h5>
                            <p>pakheri Bakmijowo</p>
                        </div>
                    </div>
                </a>

                <!-- TIKTOK -->
                <a href="https://www.tiktok.com/@bakmijowo_officia?_r=1&_t=ZS-958sF9VRTKG" target="_blank" class="text-decoration-none text-dark">
                    <div class="kontak-item">
                        <div class="kontak-icon"><i class="bi bi-tiktok"></i></div>
                        <div class="kontak-text">
                            <h5>TikTok</h5>
                            <p>@bakmijowo_official</p>
                        </div>
                    </div>
                </a>

                <!-- ALAMAT -->
                <div class="kontak-item">
                    <div class="kontak-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div class="kontak-text">
                        <h5>Alamat</h5>
                        <p>Jl. Simbang, Bebengan, Kec.Boja, Kabupaten Kendal</p>
                    </div>
                </div>

                <!-- JAM -->
                <div class="kontak-item">
                    <div class="kontak-icon"><i class="bi bi-clock-fill"></i></div>
                    <div class="kontak-text">
                        <h5>Jam Operasional</h5>
                        <p>18.00 - 00.00 WIB</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- KANAN -->
        <div class="col-lg-7 reveal reveal-right">
            <div class="kontak-box">

                <h3 class="kontak-judul">Tulis Ulasan</h3>
                <p class="kontak-sub">Bagikan pengalaman Anda menikmati Bakmi Jowo kami</p>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('testimoni.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Ulasan</label>
                            <textarea name="pesan" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label d-block">Rating</label>

                            <input type="hidden" name="rating" id="rating-value" required>

                            <div class="rating-stars">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-kirim w-100">
                                Kirim Ulasan
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<!-- ================= RATING ================= -->
@php
$testimonis = \App\Models\Testimoni::latest()->take(6)->get();
@endphp

<div class="container mt-5">
    <h3 class="text-center mb-4 fw-bold" style="color:#fff;">
        Ulasan Anda!!!
    </h3>

    <div class="row">
        @foreach($testimonis as $t)
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow rounded h-100 bg-white text-dark">

                <h5 class="fw-bold">{{ $t->nama }}</h5>

                <div class="mb-2" style="color:#f4b400;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $t->rating)
                            ⭐
                        @else
                            ☆
                        @endif
                    @endfor
                </div>

                <small class="text-muted">
                    {{ $t->created_at->format('d M Y') }}
                </small>

                <p class="mt-2">"{{ $t->pesan }}"</p>

@if($t->balasan)
    <div class="mt-3 p-3 rounded-3"
         style="background:#f8f9fa; border-left:4px solid #000;">
        <strong>Balasan Admin:</strong>
        <p class="mb-0 mt-1">{{ $t->balasan }}</p>
    </div>
@endif

            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const stars = document.querySelectorAll(".star");
    const ratingValue = document.getElementById("rating-value");

    stars.forEach(star => {

        star.addEventListener("mouseover", function(){
            resetStars();
            highlightStars(this.dataset.value);
        });

        star.addEventListener("click", function(){
            ratingValue.value = this.dataset.value;
            setSelected(this.dataset.value);
        });

    });

    function highlightStars(value){
        stars.forEach(star => {
            if(star.dataset.value <= value){
                star.classList.add("hovered");
            }
        });
    }

    function setSelected(value){
        stars.forEach(star => {
            star.classList.remove("selected");
            if(star.dataset.value <= value){
                star.classList.add("selected");
            }
        });
    }

    function resetStars(){
        stars.forEach(star => {
            star.classList.remove("hovered");
        });
    }

});
</script>

<!-- ================= GOOGLE MAPS ================= -->
<div class="container-fluid px-0 mt-4 reveal">

    <div class="text-center mb-3">
        <a href="https://maps.app.goo.gl/gRjKs9Y3JGS7bACL8"
           target="_blank"
           class="btn btn-dark px-4 py-2 rounded-pill">
            📍 Lihat Lokasi di Google Maps
        </a>
    </div>

    <iframe
        src="https://www.google.com/maps?q=-7.747033,110.402376&z=15&output=embed"
        allowfullscreen
        loading="lazy">
    </iframe>

</div>

<!-- ================= SCRIPT SCROLL ================= -->
<script>
document.addEventListener("DOMContentLoaded", function(){

    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add("active");
            }
        });
    }, {
        threshold: 0.2
    });

    reveals.forEach(reveal => {
        observer.observe(reveal);
    });

});
</script>

@endsection