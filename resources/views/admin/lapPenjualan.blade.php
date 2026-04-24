@extends('admin.template.template')

@section('content')

<h2>Laporan Penjualan</h2>

<a href="{{ route('admin.laporan.pdf', ['bulan' => $bulan]) }}" target="_blank">
    <button style="margin-top:10px; background:#a63a56; color:white;">
        📄 Cetak PDF
    </button>
</a>

<form method="GET">
    <select name="bulan" onchange="this.form.submit()">
        @for($i=1; $i<=12; $i++)
            <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                Bulan {{ $i }}
            </option>
        @endfor
    </select>
</form>

<br>

<h3>Total Pendapatan: Rp {{ number_format($totalPendapatan) }}</h3>

<h3>
Barang Terlaris:
{{ optional($terlaris)->nama_barang ?? '-' }}
({{ optional($terlaris)->total_terjual ?? 0 }} pcs)
</h3>

<canvas id="chartPenjualan"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const data = @json($data);

const labels = data.map(item => item.nama_barang);
const values = data.map(item => item.total_terjual);

new Chart(document.getElementById('chartPenjualan'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Terjual',
            data: values
        }]
    }
});
</script>

<style>
 .table-custom {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 14px;
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

.table-custom th {
    background: #b24b60;
    color: white;
    padding: 12px;
    text-align: left;
}

.table-custom td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

.table-custom tr:hover {
    background: #f9f9f9;
}

.table-custom tr:last-child td {
    border-bottom: none;
}

.empty {
    text-align: center;
    color: #888;
    padding: 20px;
}
</style>

<table class="table-custom">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Total Terjual</th>
            <th>Pendapatan</th>
        </tr>
    </thead>

    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->total_terjual }}</td>
            <td>Rp {{ number_format($item->total_pendapatan) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="empty">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection