/* dashboard.php - Kullanıcı Paneli */
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The ECY - Dashboard</title>
    <style>
        body { text-align: center; background: #1e1e2e; color: white; font-family: Arial, sans-serif; }
        .container { margin-top: 50px; padding: 20px; }
        button { padding: 10px 20px; margin: 10px; border: none; border-radius: 5px; background-color: #ff4757; color: white; cursor: pointer; transition: 0.3s; }
        button:hover { background-color: #e84118; }
        .tools { margin-top: 20px; }
        .instagram { position: fixed; bottom: 20px; width: 100%; }
        .instagram a { color: white; text-decoration: none; font-size: 20px; }
        .footer { position: fixed; bottom: 0; width: 100%; background: #111; color: white; text-align: center; padding: 10px; }
        .footer a { color: white; text-decoration: none; margin: 0 15px; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>The ECY Dashboard</h1>
    <p>Hoş geldin, <strong><?php echo $_SESSION["username"]; ?></strong>!</p>
    <div class="container">
        <div class="tools">
            <button onclick="location.href='upload.php'">Dosya Yükle</button>
            <button onclick="location.href='download.php'">Dosya İndir</button>
            <button onclick="location.href='logout.php'">Çıkış Yap</button>
        </div>
    </div>
    <div class="instagram">
        <a href="https://www.instagram.com/the.ecy.1" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" width="50" alt="Instagram">
        </a>
    </div>
    <div class="footer">
        <a href="copyright.php">Telif Hakları</a> | 
        <a href="about.php">Hakkımızda</a>
    </div>
</body>
</html>
