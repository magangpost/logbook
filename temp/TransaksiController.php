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
        $kodepelanggan = Auth::user()->kodepelanggan;
        $nokprk = Auth::user()->nokprk;
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');

        $query = Transaksi::query();

        // Menambahkan kondisi pencarian
        if ($kodepelanggan) {
            $query->where('customer_code', 'like', '%' . $kodepelanggan . '%');
        } elseif ($nokprk) {
            $query->where('custom_field->nopen', 'like', '%' . $nokprk . '%');
        } else {
            $transaksi = collect();
            return view('transaksi.index', [
                'transaksi' => $transaksi,
                'jumlahTransaksi' => 0,
                'totalDelivered' => 0,
                'totalPending' => 0,
                'totalCancelled' => 0,
                'totalReturn' => 0,
                'totalInLocation' => 0,
                'totalDeliveryRunSheet' => 0,
                'totalUnBag' => 0,
                'totalInVehicle' => 0,
                'totalPaid' => 0,
                'totalInBag' => 0,
                'totalOnProcess' => 0,
                'totalFailedToDelivered' => 0,
                'totalIrregularity' => 0,
                'totalPicked' => 0,
                'kodepelanggan' => $kodepelanggan,
                'tanggal_kirim' => $tanggal_kirim,
                'tanggal_terima' => $tanggal_terima,
            ]);
        }

        // Menambahkan kondisi tanggal
        if ($tanggal_kirim && $tanggal_terima) {
            $query->whereBetween('connote->created_at', [$tanggal_kirim, $tanggal_terima])
                ->whereBetween('connote->updated_at', [$tanggal_kirim, $tanggal_terima]);
        }

        // Mendapatkan semua transaksi dengan pagination
        $transaksi = $query->paginate(20)->withQueryString();
        
        // Menghitung total transaksi
        $jumlahTransaksi = $query->count();

        // Menghitung total berdasarkan status
        $statusCounts = [
            'DELIVERED' => $query->where('connote->connote_state', 'DELIVERED')->count(),
            'CANCEL' => $query->where('connote->connote_state', 'CANCEL')->count(),
            'DELIVERED (RETURN DELIVERY)' => $query->where('connote->connote_state', 'DELIVERED (RETURN DELIVERY)')->count(),
            'INLOCATION' => $query->where('connote->connote_state', 'INLOCATION')->count(),
            'DELIVERYRUNSHEET' => $query->where('connote->connote_state', 'DELIVERYRUNSHEET')->count(),
            'unBag' => $query->where('connote->connote_state', 'unBag')->count(),
            'INVEHICLE' => $query->where('connote->connote_state', 'INVEHICLE')->count(),
            'PAID' => $query->where('connote->connote_state', 'PAID')->count(),
            'inBag' => $query->where('connote->connote_state', 'inBag')->count(),
            'ON PROCESS' => $query->where('connote->connote_state', 'ON PROCESS')->count(),
            'FAILEDTODELIVERED' => $query->where('connote->connote_state', 'FAILEDTODELIVERED')->count(),
            'Irregularity' => $query->where('connote->connote_state', 'Irregularity')->count(),
            'PENDING' => $query->where('connote->connote_state', 'PENDING')->count(),
            'PICKED' => $query->where('connote->connote_state', 'PICKED')->count(),
        ];

        return view('transaksi.index', [
            'transaksi' => $transaksi,
            'jumlahTransaksi' => $jumlahTransaksi,
            'totalDelivered' => $statusCounts['DELIVERED'],
            'totalPending' => $statusCounts['PENDING'],
            'totalCancelled' => $statusCounts['CANCEL'],
            'totalReturn' => $statusCounts['DELIVERED (RETURN DELIVERY)'],
            'totalInLocation' => $statusCounts['INLOCATION'],
            'totalDeliveryRunSheet' => $statusCounts['DELIVERYRUNSHEET'],
            'totalUnBag' => $statusCounts['unBag'],
            'totalInVehicle' => $statusCounts['INVEHICLE'],
            'totalPaid' => $statusCounts['PAID'],
            'totalInBag' => $statusCounts['inBag'],
            'totalOnProcess' => $statusCounts['ON PROCESS'],
            'totalFailedToDelivered' => $statusCounts['FAILEDTODELIVERED'],
            'totalIrregularity' => $statusCounts['Irregularity'],
            'totalPicked' => $statusCounts['PICKED'],
            'kodepelanggan' => $kodepelanggan,
            'tanggal_kirim' => $tanggal_kirim,
            'tanggal_terima' => $tanggal_terima,
        ]);
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
        $kodepelanggan = Auth::user()->kodepelanggan;
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');

        return Excel::download(new ExportTransaksi($kodepelanggan, $tanggal_kirim, $tanggal_terima), 'transaksi.xlsx');
    }

    public function export_csv(Request $request)
    {
        $kodepelanggan = Auth::user()->kodepelanggan;
        $tanggal_kirim = $request->query('tanggal_kirim');
        $tanggal_terima = $request->query('tanggal_terima');

        return Excel::download(new ExportTransaksi($kodepelanggan, $tanggal_kirim, $tanggal_terima), 'transaksi.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
