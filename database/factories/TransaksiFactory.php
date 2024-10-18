<?php

namespace Database\Factories;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition(): array
    {
        $tanggalKirim = $this->faker->dateTimeThisYear();

        $trackingStatuses = [
            'PACKAGING',
            'ON DELIVER',
            'DELIVERED',
        ];
        $lacak = array_map(function ($status, $index) use ($tanggalKirim) {
            $waktu = (clone $tanggalKirim)->modify("+{$index} month");
            $deskripsi = match ($status) {
                'PACKAGING' => 'Paket sedang dikemas',
                'ON DELIVER' => 'Paket sedang dikirim',
                'DELIVERED' => 'Paket telah diterima',
                default => 'Status tidak dikenal',
            };
            return [
                'waktu' => $waktu->format('M j g:i A'),
                'status' => $status,
                'deskripsi' => $deskripsi,
            ];
        }, $trackingStatuses, array_keys($trackingStatuses));

        return [
            'no_resi' => $this->faker->regexify('[A-Z0-9]{10}'),
            'layanan' => $this->faker->randomElement(['PE', 'REG', 'YES']),
            'isi_kiriman' => $this->faker->randomElement(['MAKANAN', 'DOKUMEN', 'PAKET']),
            'nama_pengirim' => $this->faker->name,
            'alamat_pengirim' => $this->faker->address,
            'kprk' => $this->faker->numberBetween(10000, 99999),
            'ktrkirim' => $this->faker->randomElement(['KCU BANDUNG', 'KCU JAKARTA', 'KCU SURABAYA']),
            'nama_penerima' => $this->faker->name,
            'alamat_penerima' => $this->faker->address,
            'kodepos_penerima' => $this->faker->postcode,
            'kota_tujuan' => $this->faker->city . ', ' . $this->faker->state . ', ' . $this->faker->citySuffix,
            'berat' => $this->faker->randomFloat(2, 0.1, 10),
            'bea_dasar' => $this->faker->numberBetween(1000, 50000),
            'ppn' => $this->faker->numberBetween(0, 10),
            'htnb' => $this->faker->randomElement(['kosong', 'diisi']),
            'jumlah' => $this->faker->numberBetween(1000, 50000),
            'tanggal_kirim' => $tanggalKirim->format('Y-m-d'),
            'tanggal_terima' => (clone $tanggalKirim)->modify("+2 month")->format('Y-m-d'),
            'status' => $this->faker->randomElement(['DELIVERED', 'PENDING', 'CANCELLED']),
            'sla' => $this->faker->numberBetween(1, 5),
            'aktual_sla' => $this->faker->numberBetween(1, 5),
            'status_sla' => $this->faker->randomElement(['DELIVERED', 'PENDING', 'CANCELLED']),
            'zonecode' => $this->faker->numberBetween(10000, 99999),
            'kprktujuan' => $this->faker->numberBetween(10000, 99999),
            'nilaibarang' => $this->faker->numberBetween(1, 10),
            'noref' => $this->faker->numberBetween(10000000, 99999999),
            'kodepelanggan' => $this->faker->randomElement(['RTUCOMMERCE', 'IBRMCOMMERCE', 'ISNTCOMMERCE', 'MRJUCOMMERCE', 'ABRCOMMERCE']),
            'nilaicod' => $this->faker->numberBetween(10000, 99999),
            'va' => $this->faker->numberBetween(100000, 999999),
            'nopendkirim' => $this->faker->numberBetween(10000, 99999),
            'beratvoulume' => $this->faker->randomFloat(2, 0.1, 10),
            'lacak' => $lacak
        ];
    }
}
