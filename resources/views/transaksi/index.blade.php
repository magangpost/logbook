@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('transaksi.create') }}">Create New Transaksi</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No Resi</th>
                                    <th>Layanan</th>
                                    <th>Isi Kiriman</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection