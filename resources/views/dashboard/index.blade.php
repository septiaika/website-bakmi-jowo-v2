@extends('layouts.app')

@section('content')

<style>

/* ============================= */
/* DASHBOARD ADMIN UMKM */
/* ============================= */

.dashboard-wrapper{
    max-width:1200px;
    margin:60px auto;
    padding:20px;
}

/* ===== HEADER ===== */
.dashboard-header{
    background: linear-gradient(135deg,#a4712a,#6b3f1d);
    padding:40px;
    border-radius:20px;
    color:#fff;
    box-shadow:0 15px 35px rgba(0,0,0,.4);
    margin-bottom:40px;
}

.dashboard-header h1{
    font-size:32px;
    margin-bottom:10px;
}

.dashboard-header p{
    opacity:.9;
    font-size:16px;
}

/* ===== STAT BOX ===== */
.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
    gap:25px;
    margin-bottom:40px;
}

.stat-card{
    background:#111;
    padding:30px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.5);
    border:1px solid rgba(255,255,255,0.05);
    transition:.3s;
    color:#fff;
}

.stat-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 40px rgba(0,0,0,.6);
}

.stat-card h3{
    font-size:16px;
    color:#aaa;
    margin-bottom:10px;
}

.stat-card h2{
    font-size:30px;
    color:#a4712a;
}

/* ===== QUICK MENU ===== */
.quick-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:25px;
}

.quick-card{
    background:#181818;
    padding:30px;
    border-radius:20px;
    color:#fff;
    text-decoration:none;
    box-shadow:0 10px 25px rgba(0,0,0,.4);
    transition:.3s;
    border:1px solid rgba(255,255,255,0.05);
}

.quick-card:hover{
    transform:translateY(-6px);
    background:#1f1f1f;
}

.quick-card h4{
    color:#a4712a;
    margin-bottom:10px;
}

.quick-card p{
    font-size:14px;
    color:#ccc;
}

/* ===== INFO BOX ===== */
.info-box{
    margin-top:50px;
    background:#111;
    padding:25px;
    border-radius:15px;
    color:#ccc;
    border-left:5px solid #a4712a;
}

</style>

<div class="dashboard-wrapper">

```
<!-- HEADER -->
<div class="dashboard-header">
    <h1>Dashboard Admin UMKM</h1>
    <p>Website Resmi Bakmi Jowo Pak Heri</p>
</div>

<!-- STATISTIK -->
<div class="stats-grid">

    <div class="stat-card">
        <h3>Total Menu</h3>
        <h2>{{ $totalMenu ?? 0 }}</h2>
    </div>

    <div class="stat-card">
        <h3>Total Galeri</h3>
        <h2>{{ $totalGaleri ?? 0 }}</h2>
    </div>

    <div class="stat-card">
        <h3>Total Testimoni</h3>
        <h2>{{ $totalTestimoni ?? 0 }}</h2>
    </div>

    <div class="stat-card">
        <h3>Rating Pelanggan</h3>
        <h2>{{ number_format($rating ?? 0,1) }} ⭐</h2>
    </div>

</div>


<!-- QUICK ACCESS -->
<div class="quick-grid">

    <a href="{{ route('dashboard.menu.index') }}" class="quick-card">
        <h4>🍜 Kelola Menu</h4>
        <p>Tambah, edit, dan hapus menu makanan & minuman.</p>
    </a>

    <a href="{{ route('dashboard.galeri.index') }}" class="quick-card">
        <h4>🖼️ Kelola Galeri</h4>
        <p>Upload dan atur foto galeri usaha.</p>
    </a>

    <a href="{{ route('dashboard.ulasan') }}" class="quick-card">
        <h4>⭐ Kelola Ulasan</h4>
        <p>Tambah, edit, dan hapus ulasan pelanggan.</p>
    </a>

    <a href="/" target="_blank" class="quick-card">
        <h4>🌐 Lihat Website</h4>
        <p>Buka halaman website seperti yang dilihat pengunjung.</p>
    </a>

</div>


<!-- INFO -->
<div class="info-box">
    ⚠️ Perubahan data menu, galeri, dan ulasan akan langsung tampil di halaman pengunjung.
    <br><br>
    ⏰ Login terakhir: {{ now()->format('d M Y H:i') }}
</div>
```

</div>

@endsection
