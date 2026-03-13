@extends('layouts.app')

@section('content')

<style>
/* BACKGROUND HITAM FULL */
body{
    background:#000 !important;
    color:#fff;
}

/* HEADER */
.ulasan-header h3{
    font-weight:800;
    letter-spacing:.5px;
    color:#fff;
}

/* CARD COKLAT */
.ulasan-card{
    background:#4b2e2e; /* coklat elegan */
    border:none;
    border-radius:20px;
    transition:.3s;
    color:#fff;
}

.ulasan-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(255,255,255,0.1);
}

/* RATING */
.star{
    font-size:18px;
}

/* BALASAN ADMIN */
.balasan-box{
    margin-top:15px;
    padding:18px;
    border-radius:16px;
    background:#2c1a1a; /* coklat lebih gelap */
    border-left:4px solid #f4b400; /* aksen emas */
    color:#fff;
}

.balasan-box small{
    font-size:12px;
    letter-spacing:.5px;
    opacity:.8;
}

/* BADGE */
.badge-status{
    font-size:11px;
    padding:6px 12px;
    border-radius:50px;
    font-weight:600;
}

/* BUTTON */
.btn-custom-warning{
    background:#f4b400;
    border:none;
    color:#000;
    font-weight:600;
}

.btn-custom-warning:hover{
    background:#e0a800;
}

.btn-custom-danger{
    background:#dc3545;
    border:none;
    font-weight:600;
}

.btn-custom-danger:hover{
    background:#bb2d3b;
}

.alert-success{
    background:#1f5134;
    color:#fff;
    border:none;
}
</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4 ulasan-header">
        <h3>Kelola Ulasan Pelanggan</h3>
        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
            {{ $ulasans->count() }} Ulasan
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($ulasans as $ulasan)
        <div class="col-md-6 mb-4">
            <div class="card ulasan-card shadow-lg h-100">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h5 class="fw-bold mb-0">{{ $ulasan->nama }}</h5>
                            <small class="text-light">
                                {{ $ulasan->created_at->format('d M Y') }}
                            </small>
                        </div>

                        @if($ulasan->balasan)
                            <span class="badge bg-success badge-status">
                                Sudah Dibalas
                            </span>
                        @else
                            <span class="badge bg-warning text-dark badge-status">
                                Belum Dibalas
                            </span>
                        @endif
                    </div>

                    {{-- Rating --}}
                    <div class="mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $ulasan->rating)
                                <span class="text-warning star">★</span>
                            @else
                                <span class="text-secondary star">☆</span>
                            @endif
                        @endfor
                        <span class="ms-2 text-light">
                            ({{ $ulasan->rating }}/5)
                        </span>
                    </div>

                    {{-- Pesan --}}
                    <p class="fst-italic text-light">
                        "{{ $ulasan->pesan }}"
                    </p>

                    {{-- Balasan Admin --}}
                    @if($ulasan->balasan)
                        <div class="balasan-box">
                            <small>Balasan Admin</small>
                            <p class="mb-0 mt-2">
                                {{ $ulasan->balasan }}
                            </p>
                        </div>
                    @endif

                    <div class="d-flex gap-2 mt-4">

                        {{-- Edit --}}
                        <a href="{{ route('dashboard.ulasan.edit', $ulasan->id) }}" 
                           class="btn btn-custom-warning btn-sm rounded-pill px-4">
                            Edit
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('dashboard.ulasan.delete', $ulasan->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Yakin mau hapus ulasan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-custom-danger btn-sm rounded-pill px-4">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center rounded-4 shadow-sm">
                    Belum ada ulasan masuk.
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection