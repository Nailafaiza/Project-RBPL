@extends('admin.template.template')

@section('content')

<h2>Laporan Penjualan</h2>

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

<div style="text-align: center; margin-top: 15px;">
    <a href="{{ route('pusat.penerimaan_pdf') }}" target="_blank">
    <button style="
            background:#a63a56;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        ">
            📄 Cetak Laporan Penjualan
        </button>

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


@endsection