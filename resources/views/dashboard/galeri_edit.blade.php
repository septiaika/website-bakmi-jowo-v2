@extends('layouts.app')

@section('content')

<div class="container-fluid dashboard-wrapper">

```
<h1 class="dashboard-title">Edit Foto Galeri</h1>
<p class="dashboard-sub">Perbarui judul, deskripsi, atau foto</p>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="upload-card">
    <form action="{{ route('dashboard.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul Foto</label>
        <input type="text" name="judul" value="{{ $galeri->judul }}" required>

        <label>Deskripsi Foto</label>
        <textarea name="deskripsi">{{ $galeri->deskripsi }}</textarea>

        <label>Foto Saat Ini</label>
        @if($galeri->foto)
            <div class="old-photo-wrapper">
                <img src="{{ asset('images/galeri/'.$galeri->foto) }}" class="old-photo">
            </div>
        @endif

        <label>Ganti Foto</label>
        <input type="file" name="foto">

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

<a href="{{ route('dashboard.galeri.index') }}" class="back-link">← Kembali ke Galeri Admin</a>
```

</div>

<style>

/* WRAPPER */
.dashboard-wrapper{
margin-top:40px;
margin-bottom:40px;
padding-left:80px;
padding-right:80px;
}

/* TITLE */
.dashboard-title{
font-size:32px;
color:#e2b16a;
font-weight:700;
margin-bottom:5px;
}

.dashboard-sub{
color:#bbb;
margin-bottom:25px;
}

/* CARD */
.upload-card{
background:linear-gradient(145deg,#1e1e1e,#2b2b2b);
padding:50px;
border-radius:16px;
box-shadow:0 10px 30px rgba(0,0,0,0.7);
border:1px solid rgba(255,255,255,0.05);
width:100%;
}

/* LABEL */
.upload-card label{
font-weight:600;
margin-bottom:6px;
display:block;
color:#ddd;
}

/* INPUT */
.upload-card input,
.upload-card textarea{
width:100%;
padding:14px 16px;
margin-bottom:18px;
border-radius:8px;
border:1px solid #444;
background:#121212;
color:#eee;
font-size:15px;
transition:0.25s;
}

.upload-card input:focus,
.upload-card textarea:focus{
border-color:#e2b16a;
outline:none;
box-shadow:0 0 8px rgba(226,177,106,0.4);
}

/* TEXTAREA */
.upload-card textarea{
min-height:90px;
resize:vertical;
}

/* BUTTON */
.upload-card button{
width:100%;
padding:16px;
border:none;
border-radius:8px;
background:linear-gradient(135deg,#a4712a,#e2b16a);
color:#000;
font-weight:700;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

.upload-card button:hover{
transform:translateY(-2px);
box-shadow:0 6px 15px rgba(226,177,106,0.4);
}

/* FOTO */
.old-photo{
width:320px;
border-radius:10px;
border:1px solid #444;
margin-bottom:10px;
}

/* ALERT */
.alert-success{
background:#1f3d1f;
color:#9de19d;
padding:15px;
border-radius:10px;
margin-bottom:20px;
}

/* LINK */
.back-link{
display:inline-block;
margin-top:15px;
color:#e2b16a;
font-weight:600;
text-decoration:none;
}

.back-link:hover{
text-decoration:underline;
}

</style>

@endsection
