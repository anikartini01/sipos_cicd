<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Balita;




class RiwayatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua balita milik user ini
        $balitas = $user->balitas()->with([
            'pemeriksaans' => function ($q) {
                $q->latest()->first();
            }
        ])->get();
        $ibuHamils = $user->ibu_hamils()->with('pemeriksaans')->get();
        // Kalau belum ada relasi pemeriksaan di model Balita, kita bisa nanti benahin.
        return view('pengguna.riwayat.index', compact('balitas', 'ibuHamils'));
    }
}
