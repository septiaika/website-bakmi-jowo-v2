@extends('layouts.app')

@section('content')
<style>

/* ===== CONTAINER ===== */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

/* ===== BANNER (SAMA GALERI) ===== */
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
}

/* ===== STATS ===== */
.admin-stats {
    background: #111;
    color: #c89b3c;
    padding: 15px 25px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 18px;
}

/* ===== TRASH (SAMA GALERI STYLE) ===== */
.btn-trash {
    background: #1f1f1f;
    color: #c89b3c;
    padding: 10px 16px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: bold;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.btn-trash:hover {
    background: #2a2a2a;
    transform: translateY(-2px);
}

/* ===== FORM (CARD GALERI STYLE) ===== */
.menu-form {
    background: #1f1f1f;
    padding: 25px;
    border-radius: 14px;
    color: #fff;
    margin-bottom: 40px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

.menu-form h3 {
    color: #c89b3c;
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
}

.menu-form button {
    background: #000;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

/* ===== TABLE (SAMA GALERI) ===== */
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
    padding: 14px;
    color: #fff;
}

.menu-table th {
    background: #111;
    color: #c89b3c;
}

.menu-table tr:nth-child(even) {
    background: #2a2a2a;
}

.menu-table img {
    width: 80px;
    border-radius: 10px;
}

/* ===== BUTTON ===== */
.btn-edit {
    background: #000;
    color: #fff;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
}

.btn-hapus {
    background: red;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
}

/* ===== MODAL ===== */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.7);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: #1f1f1f;
    color: #fff;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    width: 300px;
}

.btn-cancel {
    background: #333;
    color: #fff;
    padding: 8px 18px;
    border: none;
    border-radius: 6px;
}

.btn-delete {
    background: red;
    color: #fff;
    padding: 8px 18px;
    border: none;
    border-radius: 6px;
}

</style>

<!-- MODAL -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi Hapus</h3>
        <p>Yakin ingin menghapus menu ini?</p>

        <div style="margin-top:15px;">
            <button id="cancelBtn" class="btn-cancel">Batal</button>
            <button id="confirmBtn" class="btn-delete">Hapus</button>
        </div>
    </div>
</div>

<div class="container">

    <!-- ===== BANNER ===== -->
    <div class="admin-banner">
        <div>
            <h1>Kelola Menu</h1>
            <p>Tambah, edit, dan hapus menu</p>
        </div>

        <div style="display:flex; gap:10px; align-items:center;">
            <div class="admin-stats">
                Total Menu: {{ count($menu) }}
            </div>

            <!-- TRASH (FIXED & STYLE GALERI) -->
            <a href="{{ url('/menu/trash') }}" class="btn-trash">
                🗑 Trash
            </a>
        </div>
    </div>

    <!-- ===== FORM ===== -->
    <div class="menu-form">
        <h3>Upload Menu</h3>

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
            <button type="submit">Upload Menu</button>
        </form>
    </div>

    <!-- ===== TABLE ===== -->
    <table class="menu-table">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach($menu as $item)
        <tr>
            <td>
                @if($item->foto)
                    <img src="{{ url('images/menu/'.$item->foto) }}">
                @endif
            </td>

            <td>{{ $item->nama_menu }}</td>
            <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
            <td>{{ ucfirst($item->kategori) }}</td>
            <td>{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</td>

            <td>
                <a href="{{ route('dashboard.menu.edit',$item->id) }}" class="btn-edit">
                    Edit
                </a>

                <form method="POST" action="{{ route('dashboard.menu.destroy',$item->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn-hapus">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

<script>
let selectedForm = null;

document.querySelectorAll('.btn-hapus').forEach(btn => {
    btn.addEventListener('click', function () {
        selectedForm = this.closest('form');
        document.getElementById('deleteModal').style.display = 'flex';
    });
});

document.getElementById('cancelBtn').onclick = function () {
    document.getElementById('deleteModal').style.display = 'none';
};

document.getElementById('confirmBtn').onclick = function () {
    if (selectedForm) selectedForm.submit();
};
</script>

@endsection