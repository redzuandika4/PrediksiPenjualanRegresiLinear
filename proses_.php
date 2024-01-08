<?php

//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regresi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//mengambil data dari form
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$penjualan = $_POST['penjualan'];

//insert data ke tabel penjualan
$sql = "INSERT INTO penjualan (bulan, tahun, jumlah_penjualan) VALUES ('$bulan', '$tahun', '$penjualan')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
    header("location:add_penjualan.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
