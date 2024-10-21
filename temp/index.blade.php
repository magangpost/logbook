@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3">
            <div class="row mb-3 mt-4">
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-list-check fs-2 text-success"></i>
                            <h5 class="card-title">Total Transaksi</h5>
                            <p class="card-text">{{ $jumlahTransaksi }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-check-circle fs-2 text-primary"></i>
                            <h5 class="card-title">Transaksi Terkirim</h5>
                            <p class="card-text">{{ $totalDelivered }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-hourglass-split fs-2 text-warning"></i>
                            <h5 class="card-title">Transaksi Tertunda</h5>
                            <p class="card-text">{{ $totalPending }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-x-circle fs-2 text-danger"></i>
                            <h5 class="card-title">Transaksi Digagalkan</h5>
                            <p class="card-text">{{ $totalCancelled }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-arrow-return-right fs-2 text-info"></i>
                            <h5 class="card-title">Transaksi Kembali</h5>
                            <p class="card-text">{{ $totalReturn }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-people fs-2 text-secondary"></i>
                            <h5 class="card-title">Transaksi Dalam Proses</h5>
                            <p class="card-text">{{ $totalOnProcess }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-bag fs-2 text-dark"></i>
                            <h5 class="card-title">Transaksi Di Kendaraan</h5>
                            <p class="card-text">{{ $totalInVehicle }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-check-circle fs-2 text-success"></i>
                            <h5 class="card-title">Transaksi Dibayar</h5>
                            <p class="card-text">{{ $totalPaid }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-exclamation-circle fs-2 text-warning"></i>
                            <h5 class="card-title">Transaksi Irregularity</h5>
                            <p class="card-text">{{ $totalIrregularity }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-basket fs-2 text-info"></i>
                            <h5 class="card-title">Transaksi Di Tas</h5>
                            <p class="card-text">{{ $totalInBag }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-truck fs-2 text-primary"></i>
                            <h5 class="card-title">Transaksi Dalam Pengiriman</h5>
                            <p class="card-text">{{ $totalInLocation }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-archive fs-2 text-dark"></i>
                            <h5 class="card-title">Transaksi Dalam Penyimpanan</h5>
                            <p class="card-text">{{ $totalDeliveryRunSheet }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-clock fs-2 text-secondary"></i>
                            <h5 class="card-title">Transaksi Belum Terbayar</h5>
                            <p class="card-text">{{ $totalUnBag }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-exclamation-triangle fs-2 text-danger"></i>
                            <h5 class="card-title">Transaksi Gagal Dikirim</h5>
                            <p class="card-text">{{ $totalFailedToDelivered }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card text-center bg-light">
                        <div class="card-body">
                            <i class="bi bi-arrow-up-circle fs-2 text-primary"></i>
                            <h5 class="card-title">Transaksi Diangkat</h5>
                            <p class="card-text">{{ $totalPicked }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-info mb-3">Export to CSV</a>
                <form method="GET" action="{{ route('transaksi.index') }}" class="mb-3">
                    <input type="date" name="tanggal_kirim" value="{{ request('tanggal_kirim') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Kirim">
                    <input type="date" name="tanggal_terima" value="{{ request('tanggal_terima') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Terima">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No Resi</th>
                                <th>Layanan</th>
                                <th>Isi Kiriman</th>
                                <th>Nama Pengirim</th>
                                <th>Alamat Pengirim</th>
                                <th>KPRK</th>
                                <th>KTR Kirim</th>
                                <th>Nama Penerima</th>
                                <th>Alamat Penerima</th>
                                <th>Kodepos Penerima</th>
                                <th>Kota Tujuan</th>
                                <th>Berat</th>
                                <th>Bea Dasar</th>
                                <th>PPN</th>
                                <th>HTNB</th>
                                <th>Jumlah</th>
                                <th>Tanggal Kirim</th>
                                <th>Tanggal Terima</th>
                                <th>Status</th>
                                <th>SLA</th>
                                <th>Aktual SLA</th>
                                <th>Status SLA</th>
                                <th>Zonecode</th>
                                <th>KPRK Tujuan</th>
                                <th>Nilai Barang</th>
                                <th>No Ref</th>
                                <th>Kode Pelanggan</th>
                                <th>Nilai COD</th>
                                <th>No Pend Kirim</th>
                                <th>Berat Volume</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transaksi as $item)
                                <tr>
                                    <td>{{ $item['connote']['connote_code'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_service'] ?? 'N/A' }}</td>
                                    <td>{{ $item['koli_data'][0]['koli_description'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_sender_name'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_sender_address'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['nokprk'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['nopen'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_receiver_name'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_receiver_address'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_receiver_zipcode'] ?? 'N/A' }}</td>
                                    <td>{{ $item['destination_data']['customer_address_detail'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['actual_weight'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_service_price'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['ppn'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['surcharge_amount'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_amount'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['created_at'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['updated_at'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['connote_state'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['final_swp'] ?? 'N/A' }}</td>

                                    <td>{{ $item['connote']['actual_sla'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['status_sla'] ?? 'N/A' }}</td>

                                    <td>{{ $item['connote']['zone_code_to'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['destination_kprk'] ?? 'N/A' }}</td>
                                    <td>{{ $item['koli_data'][0]['koli_custom_field']['harga_barang'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['ref_no'] ?? 'N/A' }}</td>
                                    <td>{{ $item['customer_code'] ?? 'RETAIL' }}</td>
                                    <td>{{ $item['custom_field']['total_cod'] ?? 'N/A' }}</td>
                                    <td>{{ $item['custom_field']['no_pend_kirim'] ?? 'N/A' }}</td>
                                    <td>{{ $item['connote']['volume_weight'] ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $transaksi->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection