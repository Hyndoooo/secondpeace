@extends('layouts.master') {{-- Sesuaikan dengan layout utama kamu --}}

@section('title', 'Laporan Penjualan')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Laporan Penjualan</h1>

    <div class="mb-3">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Jumlah Terjual</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- Contoh data dummy, nanti bisa kamu looping dari controller --}}
            <tr>
                <td>1</td>
                <td>2025-04-24</td>
                <td>Produk A</td>
                <td>5</td>
                <td>Rp10.000</td>
                <td>Rp50.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2025-04-24</td>
                <td>Produk B</td>
                <td>2</td>
                <td>Rp20.000</td>
                <td>Rp40.000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-end">Total Keseluruhan:</th>
                <th>Rp90.000</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
