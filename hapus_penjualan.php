<?php
include('config.php');
$id = $_GET['id'];
// Query SQL untuk menghapus data berdasarkan id
$sql = "DELETE FROM tb_penjualan WHERE id_penjualan = $id";

if (mysqli_query($conn, $sql)) {
    header("Location:tambah_penjualan.php");
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
    echo $id;
}

// Menutup koneksi database
mysqli_close($conn);
?>

