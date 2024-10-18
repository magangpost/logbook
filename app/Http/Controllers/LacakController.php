<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LacakController extends Controller
{
    public function index(Request $request)
    {
        return view('lacak.index', []);
    }

    public function show(Request $request)
    {
        $kodepelanggan = Auth::user()->kodepelanggan;
        $no_resi = $request->query('no_resi');
        $transaksi = Transaksi::where('no_resi', $no_resi)->first();
        
        if (!$transaksi) {
            return redirect()->route('lacak.index')->with('error', 'Transaction not found.');
        }

        if ($transaksi->kodepelanggan !== $kodepelanggan) {
            return redirect()->route('lacak.index')->with('error', 'Unauthorized access to transaction data.');
        }
        
        $transaksi->lacak = collect($transaksi->lacak)->sortByDesc('id_lacak')->values()->toArray();
        
        return view('lacak.show', ['transaksi' => $transaksi]);
    }
}