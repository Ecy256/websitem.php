<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosya Yükleme</title>
</head>
<body>
    <h2>Dosya Yükleme</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Yükle</button>
    </form>
    
    <h2>Yüklenen Dosyalar</h2>
    <ul>
        <?php
        $uploadDir = "uploads";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
            $file = $_FILES["file"];
            $targetFile = $uploadDir . "/" . basename($file["name"]);
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                echo "<p>Dosya başarıyla yüklendi!</p>";
            } else {
                echo "<p>Dosya yükleme başarısız!</p>";
            }
        }

        $files = array_diff(scandir($uploadDir), array(".", ".."));
        foreach ($files as $file) {
            echo "<li><a href='$uploadDir/$file' download>$file</a></li>";
        }
        ?>
    </ul>
</body>
</html>
