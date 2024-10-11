<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class Transaksi extends Model
{
    use HasFactory, Searchable;
    public $timestamps = false;
    protected $connection = 'mongodb';
    protected $table = 'transaksi';

    protected $fillable = [
        'no_resi', 'layanan', 'isi_kiriman', 'nama_pengirim', 'alamat_pengirim',
        'kprk', 'ktrkirim', 'nama_penerima', 'alamat_penerima', 'kodepos_penerima',
        'kota_tujuan', 'berat', 'bea_dasar', 'ppn', 'htnb', 'jumlah',
        'tanggal_kirim', 'tanggal_terima', 'status', 'sla', 'aktual_sla',
        'status_sla', 'zonecode', 'kprktujuan', 'nilaibarang', 'noref',
        'kodepelanggan', 'nilaicod', 'va', 'nopendkirim', 'beratvoulume'
    ];

    #[SearchUsingPrefix(['kodepelanggan', 'tanggal_kirim', 'tanggal_terima'])]
    public function toSearchableArray(): array
    {
        return [
            'kodepelanggan' => $this->kodepelanggan,
            'tanggal_kirim' => $this->tanggal_kirim,
            'tanggal_terima' => $this->tanggal_terima,
        ];
    }
}
