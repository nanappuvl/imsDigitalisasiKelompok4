<?php
session_start();
require 'db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$user]);
    $admin = $stmt->fetch();

    // Verifikasi password (jika menggunakan hash) atau perbandingan langsung
    if ($admin && password_verify($pass, $admin['password'])) {
        $_SESSION['admin_logged'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>