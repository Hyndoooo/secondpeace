@extends('layouts.master')

@section('title', 'Manajemen Pesanan')

@section('content')
<link rel="stylesheet" href="{{ asset('css/manajemen-pesanan.css') }}">

<div class="container">
    <h2>Manajemen Pesanan</h2>

    <!-- Filter & Tombol Aksi -->
    <div class="filter-container">
        <select>
            <option>Semua Status</option>
            <option>Menunggu Pembayaran</option>
            <option>Sedang Diproses</option>
            <option>Pesanan Dibatalkan</option>
            <option>Pesanan Dikirim</option>
            <option>Selesai</option>
        </select>
        <button class="btn btn-primary">Filter</button>
        <button class="btn btn-secondary">Reset</button>
        <button class="btn btn-danger">Hapus Semua Data</button>
    </div>

    <!-- Tabel Data -->
    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>ID Produk</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>WhatsApp</th>
                <th>Bukti Pembayaran</th>
                <th>Nomor Resi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>4</td>
                <td>23</td>
                <td>Opan26</td>
                <td><textarea>saasDW GQYRSB</textarea></td>
                <td><a href="#">62623727316</a></td>
                <td><a href="#">Lihat Bukti</a></td>
                <td><input type="text" placeholder="Nomor Resi"></td>
                <td>
                    <select>
                        <option>Sedang</option>
                        <option>Menunggu</option>
                        <option>Selesai</option>
                    </select>
                </td>
                <td><button class="btn btn-update">Update</button></td>
            </tr>
            <tr class="row-alternate">
                <td>3</td>
                <td>25</td>
                <td>jhon edit</td>
                <td><textarea>kab. indramayu</textarea></td>
                <td><a href="#">6281953345690</a></td>
                <td><a href="#">Lihat Bukti</a></td>
                <td><input type="text" placeholder="Nomor Resi"></td>
                <td>
                    <select>
                        <option>Sedang</option>
                        <option>Menunggu</option>
                        <option>Selesai</option>
                    </select>
                </td>
                <td><button class="btn btn-update">Update</button></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
