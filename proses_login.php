<?php
include('config.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengambil data user dari database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        $_SESSION['login_user'] = $username;
        header("location:index.php"); // Ganti dengan halaman dashboard setelah login berhasil
    } else {
        // Login gagal
        $error = "Username atau password salah";
    }

    mysqli_close($conn);
}
