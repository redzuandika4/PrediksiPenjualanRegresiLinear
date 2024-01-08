<?php

session_start();

// Hapus semua variabel session
session_unset();

// Hapus semua data session dan akhiri session
session_destroy();

// Redirect ke halaman login
header('Location: index.php');
exit();
