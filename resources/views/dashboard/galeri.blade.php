@extends('layouts.app')

@section('content')
<style>

/* ===== CONTAINER ===== */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

/* ===== BANNER GOLD ===== */
.admin-banner {
    background: linear-gradient(135deg,#c89b3c,#a4712a);
    color: #fff;
    padding: 35px;
    border-radius: 16px;
    margin-bottom: 35px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.4);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.admin-banner h1 {
    font-size: 32px;
    margin-bottom: 5px;
}

.admin-banner p {
    opacity: 0.9;
    font-size: 15px;
}

/* ===== STATISTIK GOLD ===== */
.admin-stats {
    background: #111;
    color: #c89b3c;
    padding: 15px 25px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 18px;
    border: 1px solid rgba(255,255,255,0.1);
}

/* ===== ALERT ===== */
.alert-success {
    background: #1f1f1f;
    color: #c89b3c;
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #c89b3c;
}

/* ===== FORM (ABU GELAP ELEGAN) ===== */
.upload-card {
    background: #1f1f1f;
    padding: 25px;
    border-radius: 14px;
    color: #fff;
    margin-bottom: 40px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

.upload-card h3{
    margin-bottom:15px;
    color:#c89b3c;
}

.upload-card input,
.upload-card textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #2c2c2c;
    color: #fff;
    font-size: 15px;
}

.upload-card input::placeholder,
.upload-card textarea::placeholder {
    color: #aaa;
}

/* ===== TOMBOL HITAM ===== */
.upload-card button {
    background: #000;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.upload-card button:hover {
    background: #222;
}

/* ===== TABLE (ABU GELAP) ===== */
.gallery-table {
    width: 100%;
    border-collapse: collapse;
    background: #1f1f1f;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

.gallery-table th,
.gallery-table td {
    padding: 14px 16px;
    text-align: left;
    color: #fff;
}

.gallery-table th {
    background: #111;
    color: #c89b3c;
    font-size: 15px;
}

.gallery-table tr:nth-child(even) {
    background: #2a2a2a;
}

.gallery-table img {
    width: 90px;
    border-radius: 10px;
}

/* ===== BUTTON AKSI ===== */
.btn-edit {
    background: #000;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    margin-right:5px;
}

.btn-edit:hover {
    background: #222;
}

.btn-delete {
    background: #FF0000;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    border: none;
    font-size: 13px;
    cursor:pointer;
}

.btn-delete:hover {
    background: #222;
}

@media(max-width:768px){
    .admin-banner{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }
}

</style>


<div class="container">

    <!-- ===== BANNER ===== -->
    <div class="admin-banner">
        <div>
            <h1>Kelola Galeri</h1>
            <p>Tambah, edit, dan hapus foto galeri</p>
        </div>

        <div class="admin-stats">
            Total Foto: {{ count($galeri) }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- ===== FORM ===== -->
    <div class="upload-card">
        <h3>Upload Foto Baru</h3>
        <form action="{{ route('dashboard.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="judul" placeholder="Judul Foto" required>
            <textarea name="deskripsi" placeholder="Deskripsi Foto"></textarea>
            <input type="file" name="foto" required>
            <button type="submit">Upload Foto</button>
        </form>
    </div>

    <!-- ===== TABLE ===== -->
    <table class="gallery-table">
        <tr>
            <th>Foto</th>
            <th>Judul</th>
            <th>deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach($galeri as $item)
        <tr>
            <td>
                @if($item->foto)
                    <img src="{{ asset('images/galeri/'.$item->foto) }}">
                @endif
            </td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <a href="{{ route('dashboard.galeri.edit',$item->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('dashboard.galeri.destroy',$item->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Hapus foto galeri?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
