@extends('layouts.app')

@section('content')
<style>

/* ===== CONTAINER ===== */
.container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    color: #fff;
}

/* ===== TITLE ===== */
.trash-title {
    font-size: 28px;
    margin-bottom: 20px;
    color: #c89b3c;
}

/* ===== CARD ITEM (SAMAIN GALERI) ===== */
.trash-card {
    background: #1f1f1f;
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 6px 20px rgba(0,0,0,0.4);
}

/* ===== TEXT ===== */
.trash-card p {
    margin: 0;
    font-weight: bold;
}

/* ===== BUTTON RESTORE ===== */
.btn-restore {
    background: #c89b3c;
    color: #111;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.btn-restore:hover {
    background: #a4712a;
}

/* ===== EMPTY STATE ===== */
.empty {
    text-align: center;
    color: #aaa;
    margin-top: 50px;
}

/* ===== OPTIONAL IMAGE STYLE (kalau mau pakai foto menu) ===== */
.trash-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.trash-left img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
}

</style>

<div class="container">

    <div class="trash-title">🗑 Trash Menu</div>

    @if($menu->count() > 0)

        @foreach($menu as $item)
            <div class="trash-card">

                <div class="trash-left">

                    @if($item->foto)
                        <img src="{{ url('images/menu/'.$item->foto) }}">
                    @endif

                    <p>{{ $item->nama_menu }}</p>

                </div>

                <form action="{{ route('menu.restore', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-restore">
                        Restore
                    </button>
                </form>

            </div>
        @endforeach

    @else
        <div class="empty">
            Tidak ada data di trash
        </div>
    @endif

</div>
@endsection