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
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv', ['kodepelanggan' => request('kodepelanggan'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-info mb-3">Export to CSV</a>
                <form method="GET" action="{{ route('transaksi.index') }}" class="mb-3">
                    <input type="text" name="kodepelanggan" placeholder="Cari Transaksi" value="{{ request('kodepelanggan') }}" class="form-control" style="display:inline-block; width:auto;">
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
                                <th>Detail</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($transaksi as $item)
                                <tr>
                                    <td>{{ $item->no_resi }}</td>
                                    <td>{{ $item->layanan }}</td>
                                    <td>{{ $item->isi_kiriman }}</td>
                                    <td>{{ $item->nama_pengirim }}</td>
                                    <td>{{ $item->alamat_pengirim }}</td>
                                    <td>{{ $item->kprk }}</td>
                                    <td>{{ $item->ktrkirim }}</td>
                                    <td>{{ $item->nama_penerima }}</td>
                                    <td>{{ $item->alamat_penerima }}</td>
                                    <td>{{ $item->kodepos_penerima }}</td>
                                    <td>{{ $item->kota_tujuan }}</td>
                                    <td>{{ $item->berat }}</td>
                                    <td>{{ $item->bea_dasar }}</td>
                                    <td>{{ $item->ppn }}</td>
                                    <td>{{ $item->htnb }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->tanggal_kirim }}</td>
                                    <td>{{ $item->tanggal_terima }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->sla }}</td>
                                    <td>{{ $item->aktual_sla }}</td>
                                    <td>{{ $item->status_sla }}</td>
                                    <td>{{ $item->zonecode }}</td>
                                    <td>{{ $item->kprktujuan }}</td>
                                    <td>{{ $item->nilaibarang }}</td>
                                    <td>{{ $item->noref }}</td>
                                    <td>{{ $item->kodepelanggan }}</td>
                                    <td>{{ $item->nilaicod }}</td>
                                    <td>{{ $item->nopendkirim }}</td>
                                    <td>{{ $item->beratvoulume }}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection