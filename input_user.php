<?php
include('config.php');
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$level = $_POST['user_level'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "INSERT INTO tb_users (nama,no_hp,level,username,password) VALUES ('$nama','$no_hp','$level','$username','$password')";

if (mysqli_query($conn, $sql)) {
    header("Location:data_user.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
