<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th { background: #a63a56; color: white; }
        th, td { padding: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<h2>Laporan Penjualan (Admin) - Bulan {{ $bulan }}</h2>

<p>Total Pendapatan: Rp {{ number_format($totalPendapatan) }}</p>

<p>
Barang Terlaris:
{{ optional($terlaris)->nama_barang ?? '-' }}
({{ optional($terlaris)->total_terjual ?? 0 }} pcs)
</p>

<br>

<table>
    <tr>
        <th>Nama Barang</th>
        <th>Total Terjual</th>
        <th>Pendapatan</th>
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->total_terjual }}</td>
        <td>Rp {{ number_format($item->total_pendapatan) }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>