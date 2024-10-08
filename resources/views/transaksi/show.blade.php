<!-- resources/views/transaksi/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Details</title>
</head>
<body>
    <h1>Transaksi Details</h1>
    <p>No Resi: {{ $transaksi->no_resi }}</p>
    <p>Layanan: {{ $transaksi->layanan }}</p>
    <p>Nama Pengirim: {{ $transaksi->nama_pengirim }}</p>
    <p>Alamat Pengirim: {{ $transaksi->alamat_pengirim }}</p>
    <p>Nama Penerima: {{ $transaksi->nama_penerima }}</p>
    <p>Alamat Penerima: {{ $transaksi->alamat_penerima }}</p>
    <p>Status: {{ $transaksi->status }}</p>
    <a href="{{ route('transaksi.index') }}">Back to Transaksi</a>
</body>
</html>
