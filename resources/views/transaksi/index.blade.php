@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="rowasd">
            <div class="columnasd">
                <div class="cardasd unguuu">
                    <i class="bi bi-list-check fs-2 text-success"></i>
                    <h6 class="card-title">Total Transaksi</h6>
                    <p class="card-text">{{ $jumlahTransaksi }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd biruu">
                    <i class="bi bi-check-circle fs-2 text-primary"></i>
                    <h6 class="card-title">Transaksi Terkirim</h6>
                    <p class="card-text">{{ $totalDelivered }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd pinkk">
                    <i class="bi bi-hourglass-split fs-2 text-warning"></i>
                    <h6 class="card-title">Transaksi Tertunda</h6>
                    <p class="card-text">{{ $totalPending }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd hijauu">
                    <i class="bi bi-x-circle fs-2 text-danger"></i>
                    <h6 class="card-title">Transaksi Digagalkan</h6>
                    <p class="card-text">{{ $totalCancelled }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd kuningg">
                    <i class="bi bi-arrow-return-right fs-2 text-info"></i>
                    <h6 class="card-title">Transaksi Kembali</h6>
                    <p class="card-text">{{ $totalReturn }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd maroonn">
                    <i class="bi bi-people fs-2 text-secondary"></i>
                    <h6 class="card-title">Transaksi Dalam Proses</h6>
                    <p class="card-text">{{ $totalOnProcess }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd orangee">
                    <i class="bi bi-bag fs-2 text-dark"></i>
                    <h6 class="card-title">Transaksi Di Kendaraan</h6>
                    <p class="card-text">{{ $totalInVehicle }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd birutuaa">
                    <i class="bi bi-check-circle fs-2 text-success"></i>
                    <h6 class="card-title">Transaksi Dibayar</h6>
                    <p class="card-text">{{ $totalPaid }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd greennn">
                    <i class="bi bi-exclamation-circle fs-2 text-warning"></i>
                    <h6 class="card-title">Transaksi Irregularity</h6>
                    <p class="card-text">{{ $totalIrregularity }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd goldd">
                    <i class="bi bi-basket fs-2 text-info"></i>
                    <h6 class="card-title">Transaksi Di Tas</h6>
                    <p class="card-text">{{ $totalInBag }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd greyyy">
                    <i class="bi bi-truck fs-2 text-primary"></i>
                    <h6 class="card-title">Transaksi Dalam Pengiriman</h6>
                    <p class="card-text">{{ $totalInLocation }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd neoon">
                    <i class="bi bi-archive fs-2 text-dark"></i>
                    <h6 class="card-title">Transaksi Dalam Penyimpanan</h6>
                    <p class="card-text">{{ $totalDeliveryRunSheet }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd ungutuaa">
                    <i class="bi bi-clock fs-2 text-secondary"></i>
                    <h6 class="card-title">Transaksi Belum Terbayar</h6>
                    <p class="card-text">{{ $totalUnBag }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd biruudiamondd">
                    <i class="bi bi-exclamation-triangle fs-2 text-danger"></i>
                    <h6 class="card-title">Transaksi Gagal Dikirim</h6>
                    <p class="card-text">{{ $totalFailedToDelivered }}</p>
                </div>
            </div>
            <div class="columnasd">
                <div class="cardasd redd">
                    <i class="bi bi-arrow-up-circle fs-2 text-primary"></i>
                    <h6 class="card-title">Transaksi Diangkat</h6>
                    <p class="card-text">{{ $totalPicked }}</p>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-info mb-3">Export to CSV</a>
                <form method="GET" action="{{ route('transaksi.index') }}" class="mb-3">
                    @if(Auth::user()->role == 'admin')
                        <input type="text" name="kodepelanggan" placeholder="Kode Pelanggan" value="{{ request('kodepelanggan') }}" class="form-control" style="display:inline-block; width:auto;">
                        <input type="text" name="nokprk" placeholder="No KPRK" value="{{ request('nokprk') }}" class="form-control" style="display:inline-block; width:auto;">
                    @endif
                    <input type="date" name="tanggal_kirim" value="{{ request('tanggal_kirim') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Kirim">
                    <input type="date" name="tanggal_terima" value="{{ request('tanggal_terima') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Terima">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                @if($transaksi->isEmpty())
                @else
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
                                    <th>Detail</th>
                                    <th>Update</th>
                                    <th>Delete</th>
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
                                        <td><a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-secondary">Detail</a></td>
                                        <td><a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-primary">Update</a></td>
                                        <td>
                                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transaksi->appends(request()->query())->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection