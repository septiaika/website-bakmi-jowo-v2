@extends('layouts.app')

@section('content')

<div style="max-width:600px;margin:80px auto;text-align:center;">

    <div style="background:#fff;padding:40px;border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);">

        <h2 style="color:#28a745;font-size:32px;margin-bottom:10px;">
            ✔ Pesanan Berhasil
        </h2>

        <p style="font-size:18px;margin-bottom:30px;">
            Silakan klik kirim pesan Anda melalui WhatsApp!<br>
            agar pesanan segera dibuat.
        </p>

        <a href="{{ session('wa_link') }}"
        target="_blank"
        style="background:#25D366;color:#fff;
        padding:14px 30px;
        border-radius:30px;
        font-size:18px;
        text-decoration:none;
        font-weight:bold;">

        Kirim Pesanan ke WhatsApp
        </a>

        <br><br>

        <a href="{{ route('menu') }}"
        style="color:#8b5e3c;text-decoration:none;font-weight:bold;">
        ← Kembali ke Menu
        </a>

    </div>

</div>

@endsection