<!-- resources/views/transaksi/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Transaksi</title>
</head>
<body>
    <h1>Create New Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <label for="no_resi">No Resi:</label>
        <input type="text" id="no_resi" name="no_resi"><br><br>

        <label for="layanan">Layanan:</label>
        <input type="text" id="layanan" name="layanan"><br><br>

        <label for="nama_pengirim">Nama Pengirim:</label>
        <input type="text" id="nama_pengirim" name="nama_pengirim"><br><br>

        <label for="alamat_pengirim">Alamat Pengirim:</label>
        <input type="text" id="alamat_pengirim" name="alamat_pengirim"><br><br>

        <label for="nama_penerima">Nama Penerima:</label>
        <input type="text" id="nama_penerima" name="nama_penerima"><br><br>

        <label for="alamat_penerima">Alamat Penerima:</label>
        <input type="text" id="alamat_penerima" name="alamat_penerima"><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status"><br><br>

        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('transaksi.index') }}">Back to Transaksi</a>
</body>
</html>
