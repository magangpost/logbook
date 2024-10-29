@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Create New Transaksi</a>
                <a href="{{ route('transaksi.export_excel', ['kodepelanggan' => request('kodepelanggan'), 'nokprk' => request('nokprk'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-primary mb-3">Export to Excel</a>
                <a href="{{ route('transaksi.export_csv', ['kodepelanggan' => request('kodepelanggan'), 'nokprk' => request('nokprk'), 'tanggal_kirim' => request('tanggal_kirim'), 'tanggal_terima' => request('tanggal_terima')]) }}" class="btn btn-info mb-3">Export to CSV</a>
                <form method="GET" action="{{ route('menukiriman.index') }}" class="mb-3">
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
                                    <th>Kode Booking</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Status Antaran Pertama</th>
                                    <th>Keterangan Gagal Antar</th>
                                    <th>Tanggal Update</th>
                                    <th>Status</th>
                                    <th>Lokasi Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $item)
                                    <tr>
                                        <td>{{ $item['connote']['connote_code'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['connote_service'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['connote_booking_code'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['created_at'] ?? 'N/A' }}</td>
                                        <td>{{ $item['custom_field']['first_attempt_time'] ?? 'N/A' }}</td>
                                        <td>{{ $item['custom_field']['reason_failedtodelivered'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['updated_at'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['connote_state'] ?? 'N/A' }}</td>
                                        <td>{{ $item['connote']['currentLocation']['name'] ?? 'N/A' }}</td>
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
                                        <a class="page-link" href="{{ route('menukiriman.index', array_merge(request()->except(['page']), ['page' => 1, 'limit' => $limit])) }}"><<</a>
                                    </li>
                                @endif

                                <!-- Previous Page Link -->
                                @if ($currentPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('menukiriman.index', array_merge(request()->except(['page']), ['page' => $currentPage - 1, 'limit' => $limit])) }}"><</a>
                                    </li>
                                @endif

                                <!-- Current Page Indicator -->
                                <li class="page-item active"><span class="page-link">{{ $currentPage }}</span></li>

                                <!-- Next Page Link -->
                                @if ($currentPage < $totalPages)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('menukiriman.index', array_merge(request()->except(['page']), ['page' => $currentPage + 1, 'limit' => $limit])) }}">></a>
                                    </li>
                                @endif

                                <!-- Last Page Link -->
                                @if ($currentPage < $totalPages)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('menukiriman.index', array_merge(request()->except(['page']), ['page' => $totalPages, 'limit' => $limit])) }}">>></a>
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