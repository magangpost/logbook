<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_resi', 255)->unique();
            $table->string('layanan', 255)->nullable();
            $table->string('isi_kiriman', 255)->nullable();
            $table->string('nama_pengirim', 255)->nullable();
            $table->string('alamat_pengirim', 255)->nullable();
            $table->string('kprk', 255)->nullable();
            $table->string('ktrkirim', 255)->nullable();
            $table->string('nama_penerima', 255)->nullable();
            $table->string('alamat_penerima', 255)->nullable();
            $table->string('kodepos_penerima', 255)->nullable();
            $table->string('kota_tujuan', 255)->nullable();
            $table->string('berat', 10, 2)->nullable();
            $table->integer('bea_dasar')->nullable();
            $table->string('ppn', 255)->nullable();
            $table->string('htnb', 255)->nullable();
            $table->string('jumlah', 255)->nullable();
            $table->date('tanggal_kirim')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->string('status', 255)->nullable();
            $table->integer('sla')->nullable();
            $table->integer('aktual_sla')->nullable();
            $table->string('status_sla', 255)->nullable();
            $table->string('zonecode', 255)->nullable();
            $table->string('kprktujuan', 255)->nullable();
            $table->decimal('nilaibarang', 10, 2)->nullable();
            $table->string('noref', 255)->nullable();
            $table->string('kodepelanggan', 100)->nullable();
            $table->decimal('nilaicod', 10, 2)->nullable();
            $table->string('va', 20)->nullable();
            $table->string('nopendkirim', 255)->nullable();
            $table->decimal('beratvolume', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
