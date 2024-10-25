<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use App\Exports\ExportTransaksi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');
        $page = (int) $request->query('page', 1); // Default to page 1 if not set
        $limit = (int) $request->query('limit', 10); // Default limit is 10

        $offset = ($page - 1) * $limit;
        $query = Transaksi::query();

        if ($role == 'admin' || $role == 'pelanggan' || $role == 'kantor') {
            if ($role == 'admin') {
                $kodepelanggan = $request->query('kodepelanggan');
                $nokprk = $request->query('nokprk');
                if ($kodepelanggan) {
                    $query->where('customer_code', 'like', '%' . $kodepelanggan . '%');
                }
        
                if ($nokprk) {
                    $query->where('custom_field->nokprk', (int)$nokprk);
                }

                if ($tanggal_kirim && $tanggal_terima) {
                    $query->whereBetween('connote->created_at', [$tanggal_kirim, $tanggal_terima])
                        ->whereBetween('connote->updated_at', [$tanggal_kirim, $tanggal_terima]);
                } else {
                    return $this->returnEmptyResponse($kodepelanggan, $nokprk, $tanggal_kirim, $tanggal_terima);
                }
            } elseif ($role == 'pelanggan') {
                $kodepelanggan = Auth::user()->kodepelanggan;
                $nokprk = null;
                if ($kodepelanggan) {
                    $query->where('customer_code', 'like', '%' . $kodepelanggan . '%');
                } else {
                    return $this->returnEmptyResponse($kodepelanggan, null, $tanggal_kirim, $tanggal_terima);
                }
    
                if ($tanggal_kirim && $tanggal_terima) {
                    $query->whereBetween('connote->created_at', [$tanggal_kirim, $tanggal_terima])
                        ->whereBetween('connote->updated_at', [$tanggal_kirim, $tanggal_terima]);
                } else {
                    return $this->returnEmptyResponse($kodepelanggan, null, $tanggal_kirim, $tanggal_terima);
                }
            } elseif ($role == 'kantor') {
                $kodepelanggan = null;
                $nokprk = Auth::user()->nokprk;
                if ($nokprk) {
                    $query->where('custom_field->nokprk', (int)$nokprk);
                } else {
                    return $this->returnEmptyResponse(null, $nokprk, $tanggal_kirim, $tanggal_terima);
                }
    
                if ($tanggal_kirim && $tanggal_terima) {
                    $query->whereBetween('connote->created_at', [$tanggal_kirim, $tanggal_terima])
                        ->whereBetween('connote->updated_at', [$tanggal_kirim, $tanggal_terima]);
                } else {
                    return $this->returnEmptyResponse(null, $nokprk, $tanggal_kirim, $tanggal_terima);
                }
            }
            $totalRecords = $query->count();
            $transaksi = $query->limit($limit)->offset($offset)->get();
            $totalPages = ceil($totalRecords / $limit);

            return view('transaksi.index', [
                'transaksi' => $transaksi,
                'kodepelanggan' => $kodepelanggan,
                'nokprk' => $nokprk,
                'tanggal_kirim' => $tanggal_kirim,
                'tanggal_terima' => $tanggal_terima,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'limit' => $limit,
            ]);
        }
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

    public function export_excel(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $kodepelanggan = $request->query('kodepelanggan');
            $nokprk = $request->query('nokprk');
        }
        elseif ($role == 'pelanggan') {
            $kodepelanggan = Auth::user()->kodepelanggan;
            $nokprk = $request->query('nokprk');
        }
        elseif ($role == 'kantor') {
            $kodepelanggan = $request->query('kodepelanggan');
            $nokprk = Auth::user()->nokprk;
        }
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');

        return Excel::download(new ExportTransaksi($kodepelanggan, $nokprk, $tanggal_kirim, $tanggal_terima), 'transaksi.xlsx');
    }

    public function export_csv(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $kodepelanggan = $request->query('kodepelanggan');
            $nokprk = $request->query('nokprk');
        }
        elseif ($role == 'pelanggan') {
            $kodepelanggan = Auth::user()->kodepelanggan;
            $nokprk = $request->query('nokprk');
        }
        elseif ($role == 'kantor') {
            $kodepelanggan = $request->query('kodepelanggan');
            $nokprk = Auth::user()->nokprk;
        }
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');

        return Excel::download(new ExportTransaksi($kodepelanggan, $nokprk, $tanggal_kirim, $tanggal_terima), 'transaksi.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    private function returnEmptyResponse($kodepelanggan, $nokprk, $tanggal_kirim, $tanggal_terima)
    {
        return view('transaksi.index', [
            'transaksi' => collect(),
            'kodepelanggan' => $kodepelanggan,
            'nokprk' => $nokprk,
            'tanggal_kirim' => $tanggal_kirim,
            'tanggal_terima' => $tanggal_terima,
        ]);
    }
}
