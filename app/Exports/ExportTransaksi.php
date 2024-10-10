<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportTransaksi implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
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
