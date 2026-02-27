<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f5f5f5;
    text-align: center;
    margin: 0;
    font-family: montserrat;
}

h1 {
    margin-top: 40px;
    font-size: 40px;
}

h2{
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 20px
}

.role-container {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 60px;
}

.role-icon {
    margin-top: 40px;
    margin-bottom: 40px;
    color: white;
}

.role-card {
    background-color: #a63a56;
    width: 220px;
    height: 260px;
    border-radius: 15px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: 0.3s;
}

.role-card:hover {
    transform: scale(1.05);
}

.login-form {
    display: none;
    margin-top: 40px;
    margin-bottom: 40px;
}

.login-form h2 {
    text-align: center;   
    margin-bottom: 30px;
}

.form-box {
    width: 480px;         
    margin: auto;
}

form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;  
}

label {
    margin-bottom: 5px;
    font-weight: 500;
}

input {
    width: 100%;
    padding: 16px;       
    margin-bottom: 20px;
    border-radius: 10px;
    border: none;
    background-color: #e8d6dd;
    font-size: 14px;
}

button[type="submit"] {
    width: 50%;
    margin-top: 10px;
    align-self: center;
    font-family: montserrat;
}

button {
    background-color: #a63a56;
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    font-family: montserrat;
}

button:hover {
    opacity: 0.8;
}

.back-btn {
    background-color: gray;
    margin-top: 25px;
    font-family: montserrat;
}

.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
    backdrop-filter: blur(4px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99999; 
}

.popup-box {
    background-color: #e7b6c9;
    width: 600px;
    max-width: 90%;
    padding: 60px 40px;
    border-radius: 20px;
    text-align: center;
    position: relative;
    z-index: 100000; 
}

.popup-button {
    background-color: #a63a56;
    color: white;
    border: none;
    padding: 12px 40px;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
}

</style>

</head>
<body>

<h1 id="title">LOGIN</h1>

<div class="role-container" id="roleSelection">
    <div class="role-card" onclick="showLogin('manajer_gudang', 'Manajer Gudang')">
        <i class="bi bi-box-seam" style="font-size: 50px;"></i>
        <h3>Manajer<br>Gudang</h3>
    </div>

    <div class="role-card" onclick="showLogin('admin_toko', 'Admin Toko')">
        <i class="bi bi-shop" style="font-size: 50px;"></i>
        <h3>Admin<br>Toko</h3>
    </div>

    <div class="role-card" onclick="showLogin('manajer_pusat', 'Manajer Pusat')">
        <i class="bi bi-building" style="font-size: 50px;"></i>
        <h3>Manajer<br>Pusat</h3>
    </div>
</div>

<div class="login-form" id="loginForm">
    <h2 id="roleTitle"></h2>

    <div class="form-box">
        <form action="{{ route('login') }}" method="POST">
            @csrf
        
            <input type="hidden" name="role" id="roleInput">
        
            <label>Username</label>
            <input type="text" name="username" required>
        
            <label>Password</label>
            <input type="password" name="password" required>
        
            <button type="submit">LOGIN</button>
        </form>
        <button type="button" class="back-btn" onclick="goBack()">
            <i class="bi bi-arrow-left"></i> Kembali
        </button>
    </div>
</div>

<p style="margin-top:15px; text-align:center;">
    Belum punya akun?
    <a href="{{ route('register') }}" style="color:#a63a56; font-weight:600;">
        Register
    </a>
</p>

<script>
    function showLogin(roleValue, roleLabel) {
    document.getElementById("roleSelection").style.display = "none";
    document.getElementById("loginForm").style.display = "block";

    document.getElementById("roleTitle").innerText = roleLabel; 
    document.getElementById("roleInput").value = roleValue;   
}  

function goBack() { 
    document.getElementById("roleSelection").style.display = "flex"; 
    document.getElementById("loginForm").style.display = "none";
}

window.addEventListener("pageshow", function () {
    document.querySelector("form").reset();
});

document.addEventListener("DOMContentLoaded", function() {
    const btn = document.querySelector(".popup-button");
    if(btn){
        btn.addEventListener("click", function(){
            document.getElementById("popupOverlay").remove();
        });
    }
});

</script>

</body>

@if(session('error'))
<div id="popupOverlay" class="popup-overlay">
    <div class="popup-box">
        <p class="popup-text">{{ session('error') }}</p>
        <button class="popup-button" onclick="closePopup()">Kembali</button>
    </div>
</div>
@endif

</html>