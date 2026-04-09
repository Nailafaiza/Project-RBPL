@extends('admin.template.template')

@section('content')

<style>
    .container-custom {
        padding: 30px 40px;
        width: 100%;
    }

    .card-custom {
        background: #e8d9df;
        padding: 40px;
        border-radius: 12px;
        width: 100%;
    }

    .card-custom h3 {
        margin-bottom: 25px;
        font-size: 24px;
    }

    .input {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        border: none;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .row-flex {
        display: flex;
        gap: 20px;
        flex-wrap: wrap; 
    }

    .row-flex .input-group {
        flex: 1;
        min-width: 200px;
    }

    .label {
        font-size: 13px;
        margin-bottom: 6px;
    }

    .btn-custom {
        background: #b24b60;
        color: white;
        border: none;
        padding: 14px;
        width: 250px;
        border-radius: 12px;
        display: block;
        margin: 30px auto 0;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-custom:hover {
        background: #c27180;
    }

    .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    }

    .popup-box {
    background: white;
    padding: 20px 30px;
    border-radius: 10px;
    text-align: center;
    }

    .popup-text {
    margin-bottom: 15px;
    font-size: 16px;
    }

    .popup-button {
    padding: 8px 20px;
    border: none;
    background: #b24b60;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    }

</style>

<div class="container-custom">
    <div class="card-custom">

        <h3>Laporan Penjualan</h3>

        <form action="{{ route('lapPenjualan.store') }}" method="POST">
            @csrf
        
            <input type="text" name="nama_barang" class="input" placeholder="Nama Barang" value="{{ old('nama_barang')}}">
        
            <div class="row-flex">
                <div class="input-group">
                    <div class="label">Jumlah Terjual</div>
                    <input type="number" name="jumlah" class="input" value="{{ old('jumlah', 0) }}">
                </div>

            <div class="row-flex">
                <div class="input-group">
                    <div class="label">Total Pendapatan</div>
                    <input type="number" name="total_pendapatan" class="input" value="{{ old('total_pendapatan', 0) }}">
                </div>
        
                <div class="input-group">
                    <div class="label">Periode</div>
                    <input type="date" name="periode" class="input" value="{{ old('periode')}}">
                </div>
            </div>
        
            <button type="submit" class="btn-custom">Selesai</button>
        </form>

    </div>
</div>

@if(session('success'))
<div id="popupOverlay" class="popup-overlay">
    <div class="popup-box">
        <p class="popup-text">{{ session('success') }}</p>
        <button class="popup-button" onclick="closePopup()">OK</button>
    </div>
</div>
@endif

@if($errors->any())
<div id="errorPopup" class="popup-overlay">
    <div class="popup-box">
        <p class="popup-text">{{ $errors->first() }}</p>
        <button class="popup-button" onclick="closeErrorPopup()">OK</button>
    </div>
</div>
@endif

<script>
    function closePopup() {
        document.getElementById("popupOverlay").style.display = "none";
    }

    function closeErrorPopup() {
        document.getElementById("errorPopup").style.display = "none";
    }
</script>

@endsection