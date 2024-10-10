@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel') }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv') }}" class="btn btn-info mb-3">Export to CSV</a>
                <p>Total Transactions: {{ $jumlahTransaksi }}</p>
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
                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
</div>
@endsection