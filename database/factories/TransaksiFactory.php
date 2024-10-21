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
            'DELIVERED',
            'CANCEL',
            'DELIVERED (RETURN DELIVERY)',
            'INLOCATION',
            'DELIVERYRUNSHEET',
            'unBag',
            'INVEHICLE',
            'PAID',
            'inBag',
            'ON PROCESS',
            'FAILEDTODELIVERED',
            'Irregularity',
            'PENDING',
            'PICKED',
        ];

        $lacak = array_map(function ($status, $index) use ($tanggalKirim) {
            $waktu = (clone $tanggalKirim)->modify("+{$index} month");
            $deskripsi = match ($status) {
                'DELIVERED' => 'Paket telah diterima',
                'CANCEL' => 'Pengiriman dibatalkan',
                'DELIVERED (RETURN DELIVERY)' => 'Pengiriman dikembalikan',
                'INLOCATION' => 'Paket berada di lokasi',
                'DELIVERYRUNSHEET' => 'Paket dalam lembar pengiriman',
                'unBag' => 'Paket dibuka dari tas',
                'INVEHICLE' => 'Paket dalam kendaraan',
                'PAID' => 'Paket telah dibayar',
                'inBag' => 'Paket dalam tas',
                'ON PROCESS' => 'Paket sedang diproses',
                'FAILEDTODELIVERED' => 'Gagal dikirimkan',
                'Irregularity' => 'Ketidaknormalan terjadi',
                'PENDING' => 'Pengiriman tertunda',
                'PICKED' => 'Paket diambil',
                default => 'Status tidak dikenal',
            };
            return [
                'waktu' => $waktu->format('M j g:i A'),
                'status' => $status,
                'deskripsi' => $deskripsi,
            ];
        }, $trackingStatuses, array_keys($trackingStatuses));

        return [
            'connote' => [
                'connote_code' => $this->faker->regexify('[A-Z0-9]{10}'),
                'connote_service' => $this->faker->randomElement(['PE', 'REG', 'YES']),
                'connote_sender_name' => $this->faker->name,
                'connote_sender_address' => $this->faker->address,
                'connote_receiver_name' => $this->faker->name,
                'connote_receiver_address' => $this->faker->address,
                'connote_receiver_zipcode' => $this->faker->postcode,
                'actual_weight' => $this->faker->randomFloat(2, 0.1, 10),
                'connote_service_price' => $this->faker->numberBetween(1000, 50000),
                'connote_amount' => $this->faker->numberBetween(1000, 50000),
                'created_at' => $tanggalKirim->format('Y-m-d'),
                'updated_at' => (clone $tanggalKirim)->modify("+1 month")->format('Y-m-d'),
                'connote_state' => $this->faker->randomElement([
                    'DELIVERED',
                    'CANCEL',
                    'DELIVERED (RETURN DELIVERY)',
                    'INLOCATION',
                    'DELIVERYRUNSHEET',
                    'unBag',
                    'INVEHICLE',
                    'PAID',
                    'inBag',
                    'ON PROCESS',
                    'FAILEDTODELIVERED',
                    'Irregularity',
                    'PENDING',
                    'PICKED',
                ]),
                'actual_sla' => $this->faker->numberBetween(1, 5),
                'status_sla' => $this->faker->randomElement([
                    'DELIVERED',
                    'CANCEL',
                    'DELIVERED (RETURN DELIVERY)',
                    'INLOCATION',
                    'DELIVERYRUNSHEET',
                    'unBag',
                    'INVEHICLE',
                    'PAID',
                    'inBag',
                    'ON PROCESS',
                    'FAILEDTODELIVERED',
                    'Irregularity',
                    'PENDING',
                    'PICKED',
                ]),
                'zone_code_to' => $this->faker->numberBetween(10000, 99999),
                'volume_weight' => $this->faker->randomFloat(2, 0.1, 10),
            ],
            'koli_data' => [
                [
                    'koli_description' => $this->faker->randomElement(['MAKANAN', 'DOKUMEN', 'PAKET']),
                    'koli_custom_field' => [
                        'harga_barang' => $this->faker->numberBetween(1, 10),
                    ],
                ],
            ],
            'custom_field' => [
                'nokprk' => $this->faker->numberBetween(10000, 99999),
                'nopen' => $this->faker->numberBetween(10000, 99999),
                'ppn' => $this->faker->numberBetween(0, 10),
                'final_swp' => $this->faker->randomElement([
                    'DELIVERED',
                    'CANCEL',
                    'DELIVERED (RETURN DELIVERY)',
                    'INLOCATION',
                    'DELIVERYRUNSHEET',
                    'unBag',
                    'INVEHICLE',
                    'PAID',
                    'inBag',
                    'ON PROCESS',
                    'FAILEDTODELIVERED',
                    'Irregularity',
                    'PENDING',
                    'PICKED',
                ]),
                'destination_kprk' => $this->faker->numberBetween(10000, 99999),
                'ref_no' => $this->faker->numberBetween(10000000, 99999999),
                'total_cod' => $this->faker->numberBetween(10000, 99999),
                'no_pend_kirim' => $this->faker->numberBetween(10000, 99999),
            ],
            'destination_data' => [
                'customer_address_detail' => $this->faker->address,
            ],
            'customer_code' => $this->faker->randomElement(['RTUCOMMERCE', 'IBRMCOMMERCE', 'ISNTCOMMERCE', 'MRJUCOMMERCE', 'ABRCOMMERCE', 'RETAIL']),
            'lacak' => $lacak
        ];
    }
}