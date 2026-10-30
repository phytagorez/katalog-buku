<!DOCTYPE html>
<html>

<head>
    <title>Tambah Karyawan</title>
</head>

<body>
    <h2>Tambah Data Karyawan</h2>

    <form action="/karyawan/simpan" method="POST">
        @csrf

        <div>
            <label>Nama:</label><br>
            <input type="text" name="nama" required>
        </div>
        <br>
        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat" rows="4" cols="30" required></textarea>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="/karyawan">Batal</a>
    </form>
</body>

</html>