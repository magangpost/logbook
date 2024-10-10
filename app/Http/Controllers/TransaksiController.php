<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $jumlahTransaksi = Transaksi::count(); // Menghitung jumlah transaksi
        return view('transaksi.index', ['transaksi' => $transaksi], ['jumlahTransaksi' => $jumlahTransaksi]);
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_resi' => ['required', 'string', 'max:255', 'unique:transaksi'],
            'layanan' => ['nullable', 'string', 'max:255'],
            'isi_kiriman' => ['nullable', 'string', 'max:255'],
            'nama_pengirim' => ['nullable', 'string', 'max:255'],
            'alamat_pengirim' => ['nullable', 'string', 'max:255'],
            'kprk' => ['nullable', 'string', 'max:255'],
            'ktrkirim' => ['nullable', 'string', 'max:255'],
            'nama_penerima' => ['nullable', 'string', 'max:255'],
            'alamat_penerima' => ['nullable', 'string', 'max:255'],
            'kodepos_penerima' => ['nullable', 'string', 'max:255'],
            'kota_tujuan' => ['nullable', 'string', 'max:255'],
            'berat' => ['nullable', 'numeric'],
            'bea_dasar' => ['nullable', 'integer'],
            'ppn' => ['nullable', 'string', 'max:255'],
            'htnb' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['nullable', 'string', 'max:255'],
            'tanggal_kirim' => ['nullable', 'date'],
            'tanggal_terima' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'sla' => ['nullable', 'integer'],
            'aktual_sla' => ['nullable', 'integer'],
            'status_sla' => ['nullable', 'string', 'max:255'],
            'zonecode' => ['nullable', 'string', 'max:255'],
            'kprktujuan' => ['nullable', 'string', 'max:255'],
            'nilaibarang' => ['nullable', 'numeric'],
            'noref' => ['nullable', 'string', 'max:255'],
            'kodepelanggan' => ['nullable', 'string', 'max:100'],
            'nilaicod' => ['nullable', 'numeric'],
            'va' => ['nullable', 'string', 'max:20'],
            'nopendkirim' => ['nullable', 'string', 'max:255'],
            'beratvoulume' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Transaksi::create($request->all());
        return redirect()->route('transaksi.index');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', ['transaksi' => $transaksi]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_resi' => ['required', 'string', 'max:255', 'unique:transaksi'],
            'layanan' => ['nullable', 'string', 'max:255'],
            'isi_kiriman' => ['nullable', 'string', 'max:255'],
            'nama_pengirim' => ['nullable', 'string', 'max:255'],
            'alamat_pengirim' => ['nullable', 'string', 'max:255'],
            'kprk' => ['nullable', 'string', 'max:255'],
            'ktrkirim' => ['nullable', 'string', 'max:255'],
            'nama_penerima' => ['nullable', 'string', 'max:255'],
            'alamat_penerima' => ['nullable', 'string', 'max:255'],
            'kodepos_penerima' => ['nullable', 'string', 'max:255'],
            'kota_tujuan' => ['nullable', 'string', 'max:255'],
            'berat' => ['nullable', 'numeric'],
            'bea_dasar' => ['nullable', 'integer'],
            'ppn' => ['nullable', 'string', 'max:255'],
            'htnb' => ['nullable', 'string', 'max:255'],
            'jumlah' => ['nullable', 'string', 'max:255'],
            'tanggal_kirim' => ['nullable', 'date'],
            'tanggal_terima' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'sla' => ['nullable', 'integer'],
            'aktual_sla' => ['nullable', 'integer'],
            'status_sla' => ['nullable', 'string', 'max:255'],
            'zonecode' => ['nullable', 'string', 'max:255'],
            'kprktujuan' => ['nullable', 'string', 'max:255'],
            'nilaibarang' => ['nullable', 'numeric'],
            'noref' => ['nullable', 'string', 'max:255'],
            'kodepelanggan' => ['nullable', 'string', 'max:100'],
            'nilaicod' => ['nullable', 'numeric'],
            'va' => ['nullable', 'string', 'max:20'],
            'nopendkirim' => ['nullable', 'string', 'max:255'],
            'beratvoulume' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
