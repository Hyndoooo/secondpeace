<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        // total semua order
        $totalOrder = Pesanan::count();

        // total yang sudah dikirim
        $totalDikirim = Pesanan::where('status_pesanan', 'Pesanan Dikirim')->count();

        return view('admin.dashboard', compact('totalOrder', 'totalDikirim'));
    }
}   