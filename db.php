<?php
$host     = "localhost";
$username = "root";       // Sesuaikan username database Anda
$password = "";           // Sesuaikan password database Anda
$dbname   = "db_k3_poltek";

// Membuat koneksi menggunakan PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set error mode ke exception agar mudah mendeteksi error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>