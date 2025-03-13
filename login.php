<?php
session_start();

$correct_username = "admin";
$correct_password = "1234";

// Formdan gelen verileri al
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Yönlendirme
        exit();
    } else {
        echo "<script>alert('Hatalı kullanıcı adı veya şifre!'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Lütfen kullanıcı adı ve şifre girin!'); window.location.href='index.php';</script>";
    exit();
}
?>

