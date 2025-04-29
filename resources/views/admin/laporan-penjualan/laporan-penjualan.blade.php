@extends('layouts.master')

@section('title, Laporan Penjualan')

@section('content')
<header class="mb-4">
    <link rel="stylesheet" href="{{ asset('css/laporan-penjualan.css') }}">
    <script src="{{ asset('js/laporan-penjualan.js') }}"></script>
</header>

<div class="container-laporan">
    <h2 class="text-center">Laporan Penjualan</h2>

    <form method="GET" class="filter-form">
        <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">
        </div>
        <div class="form-group btn-group">
            <button type="submit">Tampilkan</button>
            <a href="{{ route('laporan-penjualan') }}">
                🔄 Reset
            </a>
        </div>
        <a href="{{ route('laporan-penjualan.download', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-primary">Download PDF</a>
    </form>

    <table class="laporan-table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(count($laporan) > 0)
                @php $totalSemua = 0; @endphp
                @foreach($laporan as $index => $item)
                    @php $totalSemua += $item->total_harga; @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $item->status_pesanan }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data penjualan pada rentang waktu ini.</td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-right">Total Pendapatan</th>
                <th colspan="2">
                    Rp {{ count($laporan) > 0 ? number_format($totalSemua, 0, ',', '.') : '0' }}
                </th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection