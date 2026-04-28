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

/* ===== CARD ITEM ===== */
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

</style>

<div class="container">

    <div class="trash-title">🗑 Trash Galeri</div>

    @if($galeri->count() > 0)

        @foreach($galeri as $item)
            <div class="trash-card">

                <p>{{ $item->judul }}</p>

                <form action="{{ route('galeri.restore', $item->id) }}" method="POST">
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