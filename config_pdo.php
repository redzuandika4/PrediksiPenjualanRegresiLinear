<?php
// konfigurasi database
$host = "localhost";
$dbname = "regresi";
$username = "root";
$password = "";

// membuat koneksi database dengan PDO
try {
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
}
