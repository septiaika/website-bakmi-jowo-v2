@extends('layouts.app')

@section('body-class','tema-utama')

@section('content')

<style>
/* ===== BANNER ===== */
.page-banner{
    height:550px;
    background:
        linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
        url('{{ asset("images/bg-profil-usaha.png") }}') center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:0;
    transform:scale(1.05);
    transition:1.2s ease;
}
.page-banner.show{opacity:1;transform:none}
/* ===== RESPONSIVE PAGE BANNER ===== */
@media (max-width: 1200px){
    .page-banner{
        background-size: contain;
        background-color: #000;
        height: 420px;
    }
}

/* ===== FOTO PEMILIK ===== */
.foto-pemilik{
    text-align:center;
    margin-top:-140px;
    position:relative;
    z-index:5;
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}
.foto-pemilik.show{opacity:1;transform:none}

.foto-pemilik img{
    width:230px;
    height:230px;
    object-fit:cover;
    border-radius:50%;
    border:8px solid #fff;
    box-shadow:0 15px 30px rgba(0,0,0,.25);
}

.identitas-pemilik h2{
    margin:15px 0 5px;
    font-size:30px;
    color:#fff;
}
.identitas-pemilik span{color:#ddd}

/* ===== SECTION BACKGROUND ===== */
.section-bg{
    position:relative;
    padding:80px 30px;
    margin:80px auto;
    background:url('{{ asset("images/bg-sejarah.jpg") }}') center/cover no-repeat;
    overflow:hidden;
    max-width:1200px;
    border-radius:26px;
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}
.section-bg.show{opacity:1;transform:none}

.section-bg::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.45);
}
.section-bg *{
    position:relative;
    z-index:2;
    color:#fff;
}

/* ===== JUDUL ===== */
.judul{
    text-align:center;
    font-size:34px;
    margin-bottom:40px;
}

/* ===== TIMELINE ===== */
.timeline{
    max-width:900px;
    margin:auto;
    position:relative;
    padding-left:40px;
}
.timeline::before{
    content:"";
    position:absolute;
    left:18px;
    top:0;
    bottom:0;
    width:4px;
    background:#fff;
}
.timeline-item{
    margin-bottom:50px;
    position:relative;
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}
.timeline-item.show{opacity:1;transform:none}

.timeline-dot{
    position:absolute;
    left:-2px;
    top:8px;
    width:18px;
    height:18px;
    background:#fff;
    border-radius:50%;
    border:4px solid rgba(0,0,0,.6);
}
.timeline-content{
    background:rgba(0,0,0,.6);
    padding:26px 32px;
    border-radius:20px;
    box-shadow:0 8px 22px rgba(0,0,0,.2);
}
</style>

<!-- ===== BANNER ===== -->
<div class="page-banner"></div>

<!-- ===== PROFIL PEMILIK ===== -->
<div class="foto-pemilik">
    <img src="{{ asset('images/pak-heri.png') }}">
    <div class="identitas-pemilik">
        <h2>Pak Hariyono</h2>
        <span>Pendiri & Juru Masak Utama</span>
    </div>
</div>

<!-- ===== PROFIL SINGKAT ===== -->
<div class="section-bg">
    <h2 class="judul">Profil Singkat</h2>
    <p style="max-width:900px;margin:auto;text-align:justify">
        Bakmi Jowo Pak Heri adalah usaha kuliner tradisional yang menghadirkan cita rasa khas Jawa yang autentik dan penuh kenangan. 
        Setiap hidangan dimasak menggunakan anglo dengan resep turun-temurun, menghasilkan aroma dan rasa yang khas serta menggugah selera. 
        Kami menyajikan bakmi godhog, bakmi goreng, dan berbagai menu pilihan dengan bahan berkualitas dan proses memasak yang penuh ketelatenan. 
        Dengan suasana yang hangat dan sederhana, kami berkomitmen memberikan pengalaman makan yang nyaman, lezat, dan berkesan bagi setiap pelanggan.
    </p>
</div>

<!-- ===== SEJARAH ===== -->
<div class="section-bg">
    <h2 class="judul">Sejarah Usaha</h2>
    <div class="timeline">
        @foreach([
            ['2012 — Awal Merintis','Bakmi Jowo Pak Heri memulai perjalanan dari gerobak keliling dengan semangat sederhana dan cita rasa khas rumahan.'],
            ['2014 — Mulai Dikenal','Cita rasa autentik yang dimasak dengan anglo mulai menarik perhatian pelanggan dan semakin dikenal di kalangan masyarakat.'],
            ['2016 — Menetap','Setelah mendapatkan kepercayaan pelanggan, Bakmi Jowo Pak Heri akhirnya memiliki lokasi tetap untuk memberikan kenyamanan lebih bagi para pengunjung.'],
            ['2020 — Bertahan','Di tengah masa sulit, usaha ini tetap bertahan dengan menjaga kualitas rasa dan pelayanan terbaik bagi pelanggan setia.'],
            ['Sekarang','Kini Bakmi Jowo Pak Heri terus berkembang dengan inovasi dan digitalisasi, tanpa meninggalkan cita rasa tradisional yang menjadi ciri khasnya.']
        ] as $item)
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <h4>{{ $item[0] }}</h4>
                <p>{{ $item[1] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
window.onload=()=>{
    document.querySelector('.page-banner').classList.add('show');
    document.querySelector('.foto-pemilik').classList.add('show');
};
window.addEventListener('scroll',()=>{
    document.querySelectorAll('.section-bg,.timeline-item').forEach(el=>{
        if(el.getBoundingClientRect().top < innerHeight-120){
            el.classList.add('show');
        }
    });
});
</script>

@endsection
