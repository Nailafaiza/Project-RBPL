<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajer Pusat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            display: flex;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
        }

        
        .sidebar {
            width: 250px;
            background-color: #9f3b4f;
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        
        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
        }

        .sidebar-header h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: left;
        }

        .logo-container {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            padding-left: 10px;
        }

        .logo-container img {
            width: 80px; 
            height: auto;
            filter: brightness(0) invert(1); 
        }

       
        .sidebar-menu-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 15px;
        }

        .menu a {
            display: block;
            padding: 12px 20px;
            margin-bottom: 8px;
            text-decoration: none;
            color: white;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        
        .menu a.active {
            background-color: #f2f2f2;
            color: #9f3b4f;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .menu a:hover:not(.active) {
            background-color: rgba(255,255,255,0.1);
        }

        
        .sidebar-footer {
            padding: 25px 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            opacity: 0.8;
        }

        
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
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
            padding: 0 15px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            width: 300px;
            height: 40px;
        }

        .search-box i {
            color: #b24b60;
            font-size: 16px;
        }

        .search-box input {
            border: none;
            outline: none;
            margin-left: 10px;
            width: 100%;
            font-size: 13px;
        }

        .profile {
            font-weight: 600;
            font-size: 14px;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 30px;
        }

        .content h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .content p {
            color: #7f8c8d;
            font-size: 14px;
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
            <a href="/pusat/dashboard" class="active">
                Dashboard
            </a>
            <a href="/pusat/lap_penjualan">
                Laporan Penjualan
            </a>
            <a href="/pusat/lap_stok">
                Laporan Stok
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
        <h1>Dashboard Manajer Pusat</h1>
        <p>Selamat datang, {{ session('username') }}</p>
    </div>
</div>

</body>
</html>