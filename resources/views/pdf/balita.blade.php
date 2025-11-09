<!DOCTYPE html>
<html>

<head>
    <title>Laporan Balita</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            color: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>
    <h1>Laporan Balita</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $data->nama_balita }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $data->nik }}</td>
        </tr>
        <tr>
            <th>Berat Badan</th>
            <td>{{ $pemeriksaan->berat_badan_balita ?? '-' }} kg</td>
        </tr>
        <tr>
            <th>Tinggi Badan</th>
            <td>{{ $pemeriksaan->tinggi_badan ?? '-' }} cm</td>
        </tr>
        <tr>
            <th>Status Gizi</th>
            <td>{{ $pemeriksaan->status_gizi ?? '-' }}</td>
        </tr>
    </table>
</body>

</html>
