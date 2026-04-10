<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

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
            margin-left:5px;
         
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
          box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
        <div class="sidebar-top">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="menu">
                <a href="/admin/dashboard" 
                   class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                   Dashboard
                </a>
            
                <a href="/admin/penjualan" 
                   class="{{ request()->is('admin/penjualan') ? 'active' : '' }}">
                   Penjualan
                </a>
            
                <a href="/admin/stok_barang" 
                   class="{{ request()->is('admin/stok_barang') ? 'active' : '' }}">
                   Stok Barang
                </a>
                <a href="/admin/lap_penjualan" 
                   class="{{ request()->is('admin/lap_penjualan') ? 'active' : '' }}">
                   Laporan Penjualan
                </a>
            </div>
        </div>

        <div class="logout">
            <a href="/logout">Logout</a>
        </div>
    </div>

    <div class="main">

        <div class="topbar">
            <div class="search-box">
               <form method="GET" action="/admin/stok_barang">
                    <input 
                        type="text" 
                        name="search"
                        placeholder="Cari Data.........."
                        value="{{ request('search') }}"
                        onkeyup="this.form.submit()"
                    >
                </form>
            </div>

            <div class="profile">
                Admin Toko
            </div>
        </div>

        <div class="content">
            @yield('content') 
        </div>

    </div>

</body>

</html>
