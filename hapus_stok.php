<?php
$id = $_GET['id'];
include("config.php");
$sql = " DELETE FROM tb_stok WHERE id_stok=$id";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location:kelola_stok.php");
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
