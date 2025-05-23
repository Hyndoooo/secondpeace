@extends('layouts.master-user')

@section('title', 'Dashboard Pelanggan')

@section('content')
<header class="mb-4">
    <link rel="stylesheet" href="{{ asset('css/dashboard-pelanggan.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</header>

<div class="container">
    <div class="content-wrapper">
        <h1>Welcome, Bang, Selamat Berbelanja!</h1>
        <div class="card">
            <div class="card-title">Dashboard</div>
            <div class="stat-box">
                <div class="stat-content">
                    <span class="stat-number">0</span>
                </div>
                <div class="stat-text">
                    Total Order (Pesanan Dikirim)
                </div>
                <i class="fas fa-box icon"></i>
            </div>
        </div>
    </div>
</div>
@endsection
