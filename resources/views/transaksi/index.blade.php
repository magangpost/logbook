@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel', ['kodepelanggan' => request('kodepelanggan'), 'nokprk' => request('nokprk'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv', ['kodepelanggan' => request('kodepelanggan'), 'nokprk' => request('nokprk'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-info mb-3">Export to CSV</a>
                <form method="GET" action="{{ route('transaksi.index') }}" class="mb-3">
                    @if(Auth::user()->role == 'admin')
                        <input type="text" name="kodepelanggan" placeholder="Kode Pelanggan" value="{{ request('kodepelanggan') }}" class="form-control" style="display:inline-block; width:auto;">
                        <input type="text" name="nokprk" placeholder="No KPRK" value="{{ request('nokprk') }}" class="form-control" style="display:inline-block; width:auto;">
                    @endif
                    <input type="number" name="limit" placeholder="Limit" value="{{ request('limit') }}" class="form-control" style="display:inline-block; width:auto;">
                    <input type="date" name="tanggal_kirim" value="{{ request('tanggal_kirim') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Kirim">
                    <input type="date" name="tanggal_terima" value="{{ request('tanggal_terima') }}" class="form-control" style="display:inline-block; width:auto;" placeholder="Tanggal Terima">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                @if($transaksi->isEmpty())
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                    <div class="d-flex justify-content-center">
                        <nav>
                            <ul class="pagination">
                                <!-- First Page Link -->
                                @if ($currentPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('transaksi.index', array_merge(request()->except(['page']), ['page' => 1, 'limit' => $limit])) }}"><<</a>
                                    </li>
                                @endif

                                <!-- Previous Page Link -->
                                @if ($currentPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('transaksi.index', array_merge(request()->except(['page']), ['page' => $currentPage - 1, 'limit' => $limit])) }}"><</a>
                                    </li>
                                @endif

                                <!-- Current Page Indicator -->
                                <li class="page-item active"><span class="page-link">{{ $currentPage }}</span></li>

                                <!-- Next Page Link -->
                                @if ($currentPage < $totalPages)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('transaksi.index', array_merge(request()->except(['page']), ['page' => $currentPage + 1, 'limit' => $limit])) }}">></a>
                                    </li>
                                @endif

                                <!-- Last Page Link -->
                                @if ($currentPage < $totalPages)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('transaksi.index', array_merge(request()->except(['page']), ['page' => $totalPages, 'limit' => $limit])) }}">>></a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection