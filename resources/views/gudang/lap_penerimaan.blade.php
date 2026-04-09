@extends('gudang.template.template')

@section('content')

<style>
    .container-custom {
        padding: 30px 40px;
        width: 100%;
    }

    .card-custom {
        background: #bfbfbf;
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

        <h3>Form Penerimaan Barang</h3>

        <form action="{{ route('penerimaan.store') }}" method="POST">
            @csrf
        
            <input type="text" name="nama_barang" class="input" placeholder="Nama Barang">
        
            <input type="date" name="tanggal_penerimaan" class="input">
        
            <div class="row-flex">
                <div class="input-group">
                    <div class="label">Jumlah Fisik</div>
                    <input type="number" name="jumlah" class="input" value="0">
                </div>
        
                <div class="input-group">
                    <div class="label">Kondisi Barang</div>
                    <input type="text" name="kondisi_barang" class="input">
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

<script>
    function closePopup() {
        document.getElementById("popupOverlay").style.display = "none";
    }
    </script>

@endsection