<?php
include('config.php');
$data_ke = $_POST['data_ke'];
$tanggal = $_POST['tanggal'];
$tigapuluh = $_POST['30'];
$dualima = $_POST['25'];
$duapuluh = $_POST['20'];
$limabelas = $_POST['15'];

$sql = "INSERT INTO `prediksi_penjualan` (`30`,`25`,`20`,`15`,`month`,`data_ke`) VALUES ('$tigapuluh','$dualima','$duapuluh','$limabelas','$tanggal','$data_ke')";

if (mysqli_query($conn, $sql)) {
    header("Location:tambah_penjualan.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
