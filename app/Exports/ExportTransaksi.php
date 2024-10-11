<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportTransaksi implements FromCollection, WithHeadings, WithMapping
{
    protected $kodepelanggan;
    protected $tanggal_kirim;
    protected $tanggal_terima;

    public function __construct($kodepelanggan = null, $tanggal_kirim = null, $tanggal_terima = null)
    {
        $this->kodepelanggan = $kodepelanggan;
        $this->tanggal_kirim = $tanggal_kirim;
        $this->tanggal_terima = $tanggal_terima;
    }

    public function collection()
    {
        $query = Transaksi::query();

        if ($this->kodepelanggan) {
            $query->where('kodepelanggan', 'like', '%' . $this->kodepelanggan . '%');
        }

        if ($this->tanggal_kirim && $this->tanggal_terima) {
            $query->whereBetween('tanggal_kirim', [$this->tanggal_kirim, $this->tanggal_terima])
                  ->whereBetween('tanggal_terima', [$this->tanggal_kirim, $this->tanggal_terima]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            '_id', 'no_resi', 'layanan', 'isi_kiriman', 'nama_pengirim', 'alamat_pengirim', 'kprk', 
            'ktrkirim', 'nama_penerima', 'alamat_penerima', 'kodepos_penerima', 'kota_tujuan', 'berat', 
            'bea_dasar', 'ppn', 'htnb', 'jumlah', 'tanggal_kirim', 'tanggal_terima', 'status', 'sla', 
            'aktual_sla', 'status_sla', 'zonecode', 'kprktujuan', 'nilaibarang', 'noref', 'kodepelanggan', 
            'nilaicod', 'va', 'nopendkirim', 'beratvoulume'
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->_id,
            $transaksi->no_resi,
            $transaksi->layanan,
            $transaksi->isi_kiriman,
            $transaksi->nama_pengirim,
            $transaksi->alamat_pengirim,
            $transaksi->kprk,
            $transaksi->ktrkirim,
            $transaksi->nama_penerima,
            $transaksi->alamat_penerima,
            $transaksi->kodepos_penerima,
            $transaksi->kota_tujuan,
            $transaksi->berat,
            $transaksi->bea_dasar,
            $transaksi->ppn,
            $transaksi->htnb,
            $transaksi->jumlah,
            $transaksi->tanggal_kirim,
            $transaksi->tanggal_terima,
            $transaksi->status,
            $transaksi->sla,
            $transaksi->aktual_sla,
            $transaksi->status_sla,
            $transaksi->zonecode,
            $transaksi->kprktujuan,
            $transaksi->nilaibarang,
            $transaksi->noref,
            $transaksi->kodepelanggan,
            $transaksi->nilaicod,
            $transaksi->va,
            $transaksi->nopendkirim,
            $transaksi->beratvoulume
        ];
    }
}
