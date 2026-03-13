@extends('layouts.app')

@section('content')

<style>
/* BACKGROUND */
body{
    background:#000 !important;
    color:#fff;
}

/* CARD */
.edit-card{
    background:#4b2e2e; /* coklat */
    border:none;
    border-radius:22px;
    color:#fff;
    transition:.3s;
}

.edit-card:hover{
    box-shadow:0 25px 50px rgba(255,255,255,0.08);
}

/* LABEL */
.form-label{
    font-weight:600;
    color:#f4b400; /* emas */
    margin-bottom:6px;
}

/* INPUT */
.form-control,
.form-select{
    background:#2c1a1a;
    border:1px solid #6b4a4a;
    color:#fff;
    padding:12px;
}

.form-control:focus,
.form-select:focus{
    background:#2c1a1a;
    border-color:#f4b400;
    box-shadow:none;
    color:#fff;
}

/* BALASAN SECTION */
.balasan-section{
    background:#2a1818;
    padding:20px;
    border-radius:18px;
    border-left:4px solid #f4b400;
}

/* BUTTON */
.btn-update{
    background:#f4b400;
    color:#000;
    font-weight:600;
    border:none;
}

.btn-update:hover{
    background:#e0a800;
}

.btn-cancel{
    background:#333;
    color:#fff;
    border:none;
}

.btn-cancel:hover{
    background:#555;
}

/* TITLE */
.page-title{
    font-weight:800;
    letter-spacing:.5px;
}
</style>

<div class="container py-5">

    <div class="card edit-card shadow-lg">
        <div class="card-body p-5">

            <h4 class="page-title mb-4">
                ✏️ Edit Ulasan & Balas
            </h4>

            <form action="{{ route('dashboard.ulasan.update', $ulasan->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama"
                           class="form-control rounded-4"
                           value="{{ old('nama', $ulasan->nama) }}" required>
                </div>

                {{-- Pesan --}}
                <div class="mb-4">
                    <label class="form-label">Pesan</label>
                    <textarea name="pesan"
                              class="form-control rounded-4"
                              rows="4"
                              required>{{ old('pesan', $ulasan->pesan) }}</textarea>
                </div>

                {{-- Rating --}}
                <div class="mb-4">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select rounded-4" required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                                {{ $ulasan->rating == $i ? 'selected' : '' }}>
                                {{ $i }} Bintang
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- Balasan Admin --}}
                <div class="mb-4 balasan-section">
                    <label class="form-label">
                        💬 Balasan Admin
                    </label>
                    <textarea name="balasan"
                              class="form-control rounded-4"
                              rows="4"
                              placeholder="Tulis balasan untuk ulasan ini...">{{ old('balasan', $ulasan->balasan) }}</textarea>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit"
                            class="btn btn-update rounded-pill px-5">
                        Update
                    </button>

                    <a href="{{ route('dashboard.ulasan') }}"
                       class="btn btn-cancel rounded-pill px-5">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection