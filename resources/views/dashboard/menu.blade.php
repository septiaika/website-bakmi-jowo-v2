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

/* ===== NOTIFIKASI ===== */
.alert-success {
    background: #1f1f1f;
    color: #c89b3c;
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    border-left: 4px solid #c89b3c;
}

/* ===== FORM (ABU GELAP) ===== */
.menu-form {
    background: #1f1f1f;
    padding: 25px;
    border-radius: 14px;
    color: #fff;
    margin-bottom: 40px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

.menu-form h3{
    margin-bottom:15px;
    color:#c89b3c;
}

.menu-form input,
.menu-form textarea,
.menu-form select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #2c2c2c;
    color: #fff;
    font-size: 15px;
}

.menu-form input::placeholder,
.menu-form textarea::placeholder {
    color: #aaa;
}

/* ===== TOMBOL HITAM ===== */
.menu-form button {
    background: #000;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.menu-form button:hover {
    background: #222;
}

/* ===== TABEL (ABU GELAP ELEGAN) ===== */
.menu-table {
    width: 100%;
    border-collapse: collapse;
    background: #1f1f1f;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

.menu-table th,
.menu-table td {
    padding: 14px 16px;
    text-align: left;
    color: #fff;
}

.menu-table th {
    background: #111;
    font-size: 15px;
    color: #c89b3c;
}

.menu-table tr:nth-child(even) {
    background: #2a2a2a;
}

/* ===== AKSI BUTTON EDIT ===== */
.menu-table a {
    background: #000;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
}

.menu-table a:hover {
    background: #222;
}
/* ===== AKSI BUTTON HAPUS ===== */
.menu-table button {
    background: #FF0000;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 13px;
}

.menu-table button:hover {
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
            <h1>Kelola Menu</h1>
            <p>Tambah, edit, dan hapus daftar menu Bakmi Jowo</p>
        </div>

        <div class="admin-stats">
            Total Menu: {{ count($menu) }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <!-- ===== FORM TAMBAH MENU ===== -->
    <div class="menu-form">
        <h3>Tambah Menu Baru</h3>
        <form action="{{ route('dashboard.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nama_menu" placeholder="Nama Menu" required>
            <input type="number" name="harga" placeholder="Harga" required>
            <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
            <select name="kategori" required>
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
            </select>
            <input type="file" name="foto">
            <button type="submit">Tambah Menu</button>
        </form>
    </div>

    <!-- ===== TABEL MENU ===== -->
    <table class="menu-table">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach($menu as $item)
        <tr>
            <td>
                @if($item->foto)
                    <img src="{{ url('images/menu/'.$item->foto) }}" width="80">
                @endif
            </td>
            <td>{{ $item->nama_menu }}</td>
            <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
            <td>{{ ucfirst($item->kategori) }}</td>
            <td>
                <a href="{{ route('dashboard.menu.edit',$item->id) }}">Edit</a>
                <form action="{{ route('dashboard.menu.destroy',$item->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus menu?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
