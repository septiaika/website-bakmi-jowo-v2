@extends('layouts.app')

@section('content')

<body class="login-page">

<style>
.login-box {
    width: 360px;
    margin: 80px auto;
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.login-box h3 {
    text-align: center;
    margin-bottom: 20px;
}
.login-box input,
.login-box button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
}
.login-box button {
    background: #b8935a;
    color: #fff;
    border: none;
    cursor: pointer;
}
</style>

<div class="login-box">
    <h3>Login Pemilik UMKM</h3>

    @if(session('error'))
        <div style="background:#ffe5e5; color:#b30000; padding:10px; border-radius:8px; text-align:center; margin-bottom:15px;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>
        @error('email')
            <small style="color:red;">{{ $message }}</small>
        @enderror

        <label>Password</label>
        <input type="password" name="password" required>
        @error('password')
            <small style="color:red;">{{ $message }}</small>
        @enderror

        <button type="submit">Login</button>
    </form>
</div>
@endsection
