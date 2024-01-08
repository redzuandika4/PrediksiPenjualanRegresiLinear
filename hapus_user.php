<?php
$id = $_GET['id'];
include("config.php");
$sql = " DELETE FROM tb_users WHERE id_user=$id";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location:data_user.php");
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
