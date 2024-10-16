<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class LacakController extends Controller
{
    public function index(Request $request)
    {
        return view('lacak.index', []);
    }

    public function show(Request $request)
    {
        $no_resi = $request->query('no_resi');
        $transaksi = Transaksi::where('no_resi', $no_resi)->first();
        
        if (!$transaksi) {
            return redirect()->route('lacak.index')->with('error', 'Transaction not found.');
        }
        
        $transaksi->lacak = collect($transaksi->lacak)->sortByDesc('id_lacak')->values()->toArray();
        
        return view('lacak.show', ['transaksi' => $transaksi]);
    }
}