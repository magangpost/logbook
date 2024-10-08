<!-- resources/views/transaksi/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Management</title>
</head>
<body>
    <h1>All Transaksi</h1>
    <a href="{{ route('transaksi.create') }}">Create New Transaksi</a>
    <p>Total Transaksi: {{ $jumlahTransaksi }}</p> <!-- Menampilkan jumlah transaksi -->
    <table border="1">
        <tr>
            <th>No Resi</th>
            <th>Layanan</th>
            <th>Nama Pengirim</th>
            <th>Nama Penerima</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($transaksi as $item)
        <tr>
            <td>{{ $item->no_resi }}</td>
            <td>{{ $item->layanan }}</td>
            <td>{{ $item->nama_pengirim }}</td>
            <td>{{ $item->nama_penerima }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('transaksi.show', $item->id) }}">View</a>
                <a href="{{ route('transaksi.edit', $item->id) }}">Edit</a>
                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
