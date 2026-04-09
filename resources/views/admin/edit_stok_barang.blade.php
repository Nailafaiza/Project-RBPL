@extends('admin.template.template')

@section('content')
    <style>
        .edit-container {
            width: 100%;
            max-width: 500px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .edit-title {
            text-align: center;
            margin-bottom: 25px;
            color: #000000;
            font-size: 24px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .input-custom {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #b24b60;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #c27180;
        }

    </style>

    <div class="edit-container">

        <div class="edit-title">
            Edit Stok Barang
        </div>

        <form action="{{ route('stokBarang.update', $stok->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label class="input-label">Nama Barang</label>
                <input type="text" class="input-custom" value="{{ $stok->nama_barang }}" readonly>
            </div>

            <div class="input-group">
                <label class="input-label">Jumlah Stok</label>
                <input type="number" name="jumlah" class="input-custom" value="{{ $stok->jumlah }}">
            </div>

            <button type="submit" class="btn-submit">
                Update Stok
            </button>

        </form>
    </div>

@endsection
