<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Basit bir kullanıcı kontrolü (gerçek veritabanı ile değiştirilmelidir)
        if ($username == "admin" && $password == "12345") {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Hatalı kullanıcı adı veya şifre!');</script>";
        }
    }
    
    if (isset($_POST['register'])) {
        $newUsername = $_POST['newUsername'];
        $newPassword = $_POST['newPassword'];
        $email = $_POST['email'];
        
        if ($newUsername && $newPassword && $email) {
            echo "<script>alert('Kayıt başarılı: $newUsername');</script>";
        } else {
            echo "<script>alert('Lütfen tüm alanları doldurun!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The ECY</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .header {
            position: absolute;
            top: 20px;
            font-size: 3em;
            font-weight: bold;
            background: linear-gradient(45deg, #ff0000, #00ff00, #0000ff);
            -webkit-background-clip: text;
            color: transparent;
        }
        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
        input {
            display: block;
            width: 80%;
            margin: 10px auto;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff4757;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #e84118;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 10px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 14px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">The ECY</div>
    <div class="container">
        <form method="POST">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <button type="submit" name="login">Giriş Yap</button>
            <button type="button" onclick="showRegister()">Kayıt Ol</button>
        </form>
    </div>

    <div class="container" id="registerContainer" style="display: none;">
        <form method="POST">
            <input type="text" name="newUsername" placeholder="Yeni Kullanıcı Adı" required>
            <input type="password" name="newPassword" placeholder="Yeni Şifre" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="register">Kaydı Tamamla</button>
            <button type="button" onclick="hideRegister()">İptal</button>
        </form>
    </div>

    <script>
        function showRegister() {
            document.querySelector('.container').style.display = 'none';
            document.getElementById('registerContainer').style.display = 'block';
        }

        function hideRegister() {
            document.querySelector('.container').style.display = 'block';
            document.getElementById('registerContainer').style.display = 'none';
        }
    </script>

    <div class="footer">
        <a href="copyright.php">Telif Hakları</a> |
        <a href="about.php">Hakkımızda</a> |
        <a href="quaresma.php">Quaresma</a>
    </div>
</body>
</html>
