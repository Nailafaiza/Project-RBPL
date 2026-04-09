@extends('gudang.template.template')

@section('content')
    <style>
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 15px;
            background: white;
            margin-top: 20px;
        }

        .table-custom th {
            background: #b24b60;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 15px;
        }

        .table-custom td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table-custom tr:last-child td {
            border-bottom: none;
        }

        .table-custom tr:hover {
            background: #f9e6eb;
        }

        .table-custom th:first-child {
            border-top-left-radius: 5px;
        }

        .table-custom th:last-child {
            border-top-right-radius: 5px;
        }

        .table-custom tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
        }

        .table-custom tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
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

    <table class="table-custom">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($stok as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        <a href="{{ route('stok.edit', $item->id) }}" class="btn-edit">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
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
