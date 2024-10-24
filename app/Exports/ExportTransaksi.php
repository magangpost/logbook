<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportTransaksi implements FromCollection, WithHeadings, WithMapping
{
    protected $kodepelanggan;
    protected $nokprk;
    protected $tanggal_kirim;
    protected $tanggal_terima;

    public function __construct($kodepelanggan = null, $nokprk = null, $tanggal_kirim = null, $tanggal_terima = null)
    {
        $this->kodepelanggan = $kodepelanggan;
        $this->nokprk = $nokprk;
        $this->tanggal_kirim = $tanggal_kirim;
        $this->tanggal_terima = $tanggal_terima;
    }

    public function collection()
    {
        $query = Transaksi::query();

        if ($this->kodepelanggan) {
            $query->where('customer_code', 'like', '%' . $this->kodepelanggan . '%');
        }

        if ($this->nokprk) {
            $query->where('custom_field->nokprk', (int)$this->nokprk);
        }

        if ($this->tanggal_kirim && $this->tanggal_terima) {
            $query->whereBetween('connote->created_at', [$this->tanggal_kirim, $this->tanggal_terima])
                ->whereBetween('connote->updated_at', [$this->tanggal_kirim, $this->tanggal_terima]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            '_id', 'connote.connote_code', 'connote.connote_service', 'connote.connote_sender_name', 'connote.connote_sender_address', 
            'connote.connote_receiver_name', 'connote.connote_receiver_address', 'connote.connote_receiver_zipcode', 
            'connote.actual_weight', 'connote.connote_service_price', 'connote.surcharge_amount', 'connote.connote_amount', 
            'connote.created_at', 'connote.updated_at', 'connote.connote_state', 'connote.actual_sla', 'connote.status_sla', 
            'connote.zone_code_to', 'connote.volume_weight', 'koli_data[0].koli_description', 
            'koli_data[0].koli_custom_field.harga_barang', 'custom_field.nokprk', 'custom_field.nopen', 
            'custom_field.ppn', 'custom_field.final_swp', 'custom_field.destination_kprk', 'custom_field.ref_no', 
            'custom_field.total_cod', 'custom_field.no_pend_kirim', 'destination_data.customer_address_detail', 'customer_code'
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi['_id'],
            $transaksi['connote']['connote_code'] ?? null,
            $transaksi['connote']['connote_service'] ?? null,
            $transaksi['connote']['connote_sender_name'] ?? null,
            $transaksi['connote']['connote_sender_address'] ?? null,
            $transaksi['connote']['connote_receiver_name'] ?? null,
            $transaksi['connote']['connote_receiver_address'] ?? null,
            $transaksi['connote']['connote_receiver_zipcode'] ?? null,
            $transaksi['connote']['actual_weight'] ?? null,
            $transaksi['connote']['connote_service_price'] ?? null,
            $transaksi['connote']['surcharge_amount'] ?? null,
            $transaksi['connote']['connote_amount'] ?? null,
            $transaksi['connote']['created_at'] ?? null,
            $transaksi['connote']['updated_at'] ?? null,
            $transaksi['connote']['connote_state'] ?? null,
            $transaksi['connote']['actual_sla'] ?? null,
            $transaksi['connote']['status_sla'] ?? null,
            $transaksi['connote']['zone_code_to'] ?? null,
            $transaksi['connote']['volume_weight'] ?? null,
            $transaksi['koli_data'][0]['koli_description'] ?? null,
            $transaksi['koli_data'][0]['koli_custom_field']['harga_barang'] ?? null,
            $transaksi['custom_field']['nokprk'] ?? null,
            $transaksi['custom_field']['nopen'] ?? null,
            $transaksi['custom_field']['ppn'] ?? null,
            $transaksi['custom_field']['final_swp'] ?? null,
            $transaksi['custom_field']['destination_kprk'] ?? null,
            $transaksi['custom_field']['ref_no'] ?? null,
            $transaksi['custom_field']['total_cod'] ?? null,
            $transaksi['custom_field']['no_pend_kirim'] ?? null,
            $transaksi['destination_data']['customer_address_detail'] ?? null,
            $transaksi['customer_code'] ?? null
        ];
    }
}
