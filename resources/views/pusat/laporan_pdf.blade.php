<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .info {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

    <h2>Laporan Penjualan</h2>

    <div class="info">
        Bulan: {{ $bulan }} <br>
        Tanggal Cetak: {{ date('d-m-Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Total Terjual</th>
                <th>Pendapatan</th>
            </tr>
        </thead>

        <tbody>
            @php $grandTotal = 0; @endphp

            @forelse($data as $item)
            <tr>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->total_terjual }}</td>
                <td>Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
            </tr>

            @php
                $grandTotal += $item->total_pendapatan;
            @endphp

            @empty
            <tr>
                <td colspan="3">Tidak ada data</td>
            </tr>
            @endforelse

            <tr class="total">
                <td colspan="2">Total Pendapatan</td>
                <td>Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh sistem</p>
    </div>

</body>
</html>