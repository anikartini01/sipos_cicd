<!DOCTYPE html>
<html>

<head>
    <title>Laporan Ibu Hamil</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            color: #b91c1c;
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
    <h1>Laporan Ibu Hamil</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $data->nama_ibu_hamil }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $data->nik_ibu_hamil }}</td>
        </tr>
        <tr>
            <th>Nama Suami</th>
            <td>{{ $data->nama_suami }}</td>
        </tr>
        <tr>
            <th>Berat Badan</th>
            <td>{{ $pemeriksaan->berat_badan_ibu ?? '-' }} kg</td>
        </tr>
        <tr>
            <th>Tekanan Darah</th>
            <td>{{ $pemeriksaan->tekanan_sistolik ?? '-' }}/{{ $pemeriksaan->tekanan_diastolik ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status Kesehatan</th>
            <td>{{ $pemeriksaan->status_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Usia Kehamilan</th>
            <td>{{ $pemeriksaan->usia_kehamilan ?? '-' }} minggu</td>
        </tr>
    </table>
</body>

</html>
