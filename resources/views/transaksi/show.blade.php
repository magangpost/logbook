@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('transaksi.index') }}">Back to Transaksi</a>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <th>No Resi</th>
                                        <td>{{ $transaksi->no_resi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Layanan</th>
                                        <td>{{ $transaksi->layanan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Isi Kiriman</th>
                                        <td>{{ $transaksi->isi_kiriman }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <td>{{ $transaksi->nama_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Pengirim</th>
                                        <td>{{ $transaksi->alamat_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>KPRK</th>
                                        <td>{{ $transaksi->kprk }}</td>
                                    </tr>
                                    <tr>
                                        <th>KTR Kirim</th>
                                        <td>{{ $transaksi->ktrkirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td>{{ $transaksi->nama_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Penerima</th>
                                        <td>{{ $transaksi->alamat_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos Penerima</th>
                                        <td>{{ $transaksi->kodepos_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota Tujuan</th>
                                        <td>{{ $transaksi->kota_tujuan }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <th>Berat</th>
                                        <td>{{ $transaksi->berat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bea Dasar</th>
                                        <td>{{ $transaksi->bea_dasar }}</td>
                                    </tr>
                                    <tr>
                                        <th>PPN</th>
                                        <td>{{ $transaksi->ppn }}</td>
                                    </tr>
                                    <tr>
                                        <th>HTNB</th>
                                        <td>{{ $transaksi->htnb }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>{{ $transaksi->jumlah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kirim</th>
                                        <td>{{ $transaksi->tanggal_kirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Terima</th>
                                        <td>{{ $transaksi->tanggal_terima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $transaksi->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>SLA</th>
                                        <td>{{ $transaksi->sla }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aktual SLA</th>
                                        <td>{{ $transaksi->aktual_sla }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status SLA</th>
                                        <td>{{ $transaksi->status_sla }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <th>Zonecode</th>
                                        <td>{{ $transaksi->zonecode }}</td>
                                    </tr>
                                    <tr>
                                        <th>KPRK Tujuan</th>
                                        <td>{{ $transaksi->kprktujuan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai Barang</th>
                                        <td>{{ $transaksi->nilaibarang }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Ref</th>
                                        <td>{{ $transaksi->noref }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pelanggan</th>
                                        <td>{{ $transaksi->kodepelanggan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai COD</th>
                                        <td>{{ $transaksi->nilaicod }}</td>
                                    </tr>
                                    <tr>
                                        <th>VA</th>
                                        <td>{{ $transaksi->va }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Pend Kirim</th>
                                        <td>{{ $transaksi->nopendkirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Berat Volume</th>
                                        <td>{{ $transaksi->beratvoulume }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
