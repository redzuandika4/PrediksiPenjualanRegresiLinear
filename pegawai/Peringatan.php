<?php
function Peringatan($jb)
{
    include("config.php");
    $sql = "SELECT * FROM tb_stok WHERE jenis_barang = $jb ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jenis_barang = $row['jenis_barang'];
    $stok = $row['jumlah_stok'];
    if ($stok < 100) {
        echo '<div class="alert alert-danger" role="alert">
        <b>Peringatan !!</b> <br> Stok  ' . $jb . ' Tinggal  ' . $stok . '  Barang
    </div>';
    }
}
