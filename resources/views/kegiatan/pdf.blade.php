<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kehadiran</title>
    <style>
        body { font-family: Arial; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>

    <h2>Laporan Kehadiran</h2>

    <p><strong>Kegiatan:</strong> {{ $kegiatan->nama_kegiatan }}</p>
    <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal_kegiatan }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tim</th>
                <th>Waktu Absen</th>
            </tr>
        </thead>

        <tbody>
            @foreach($kegiatan->kehadiran as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->tim }}</td>
                <td>{{ $item->waktu_absen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>