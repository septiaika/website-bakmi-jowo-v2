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
        <p style="color:red; text-align:center;">
            {{ session('error') }}
        </p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

@endsection
