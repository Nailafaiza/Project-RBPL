<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Penerimaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .info {
            text-align: right;
            font-size: 11px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #b24b60;
            color: white;
            padding: 8px;
            text-align: center;
        }

        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>

<body>

    <h2>Laporan Penerimaan Barang</h2>

    <div class="info">
        Tanggal Cetak: {{ date('d-m-Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi Barang</th>
                <th>Tanggal Penerimaan</th>
            </tr>
        </thead>

        <tbody>
            @php $total = 0; @endphp

            @forelse($data as $item)
                @php $total += $item->jumlah; @endphp
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi_barang }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal_penerimaan)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <strong>Total Barang Masuk: {{ $total }}</strong>
    </div>

</body>
</html>