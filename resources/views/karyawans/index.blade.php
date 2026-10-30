<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h2>Data Karyawan</h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif

                <a href="/karyawan/tambah">+ Tambah Karyawan Baru</a>
                <br><br>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->alamat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Data karyawan belum ada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</body>

</html>