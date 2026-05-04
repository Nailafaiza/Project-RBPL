<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajer Pusat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: montserrat;
        }

        .sidebar {
            width: 220px;
            background-color: #9f3b4f;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-top {
            padding: 20px;
        }

        .logo {
            margin-bottom: 20px;
            margin-top: 5px;
            margin-left: 5px;

        }

        .menu a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            color: white;
            border-radius: 8px;
            font-family: montserrat;
        }

        .menu a.active {
            background-color: #f2f2f2;
            color: #9f3b4f;
            font-weight: bold;
        }

        .menu a:hover {
            background-color: #c85b6f;
        }

        .logout {
            padding: 20px;
        }

        .logout a {
            color: white;
            font-family: montserrat;
            padding: 12px 15px;
            margin-bottom: 10px;
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 70px;
            background-color: #b24b60;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            color: white;
        }


        .search-box {
            background: white;
            padding: 10px 18px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            width: 350px;
            height: 45px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .search-box form {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .search-box input {
            border: none;
            outline: none;
            margin-left: 10px;
            width: 100%;
            font-family: montserrat;
        }

        .profile {
            font-weight: bold;
            font-family: montserrat;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Manajer Pusat</h3>
            <div class="logo-container">
                <img src="/asset/logo.png" alt="Logo">
            </div>
        </div>


        <div class="sidebar-menu-container">
            <div class="menu">
                <a href="/pusat/dashboard" class="{{ request()->is('pusat/dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="/pusat/lap_penjualan" class="{{ request()->is('pusat/lap_penjualan') ? 'active' : '' }}">
                    Laporan Penjualan
                </a>
                <a href="/pusat/lap_stok" class="{{ request()->is('pusat/lap_stok') ? 'active' : '' }}">
                    Laporan Stok
                </a>
                <a href="/pusat/lap_penerimaan" class="{{ request()->is('pusat/lap_penerimaan') ? 'active' : '' }}">
                    Laporan Penerimaan
                </a>

            </div>
        </div>


        <div class="sidebar-footer">
            <a href="/logout" class="logout-btn">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Cari Data...">
            </div>

            <div class="profile">
                Manajer Pusat
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

</body>

</html>
