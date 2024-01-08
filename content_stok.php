<?php
include('config.php');
//koneksi ke database
class RegresiLinearStok
{
    private $jenis_barang;

    public function JenisBarang($jb)
    {
        $this->jenis_barang = $jb;
        include('config.php');
        $sql = "SELECT  `$jb` ,data_ke  FROM prediksi_penjualan ";
        $result = mysqli_query($conn, $sql);

        //membuat array untuk menyimpan nilai x dan y
        $x = array();
        $y = array();


        //mengisi array x dan y dengan nilai dari database
        while ($row = mysqli_fetch_array($result)) {
            $x[] = $row['data_ke'];
            $y[] = $row[$jb];
        }

        //menghitung nilai rata-rata x dan y
        $avg_x = array_sum($x) / count($x);
        $avg_y = array_sum($y) / count($y);

        //menghitung nilai a dan b
        $numerator = 0;
        $denominator = 0;
        for ($i = 0; $i < count($x); $i++) {
            $numerator += ($x[$i] - $avg_x) * ($y[$i] - $avg_y);
            $denominator += pow($x[$i] - $avg_x, 2);
        }

        //periksa apakah denominasi memiliki nilai nol atau tidak
        if ($denominator != 0) {
            $b = $numerator / $denominator;
            $a = $avg_y - $b * $avg_x;

            //menghitung nilai prediksi untuk bulan selanjutnya
            $next_month = $x[count($x) - 1] + 1;
            $next_month_sales = $a + $b * $next_month;
            $prediksi_fix = round($next_month_sales);

            //menghitung tingkat error
            $sse = 0;
            for ($i = 0; $i < count($x); $i++) {
                $y_pred = $a + $b * $x[$i];
                $sse += pow($y[$i] - $y_pred, 2);
            }
            $mse = $sse / (count($x) - 2);
            $rmse = sqrt($mse);
            $mape = abs(($next_month_sales - $y[count($y) - 1]) / $y[count($y) - 1]) * 100;

            echo "<h4> <b>" . $prediksi_fix . "</b> </h4>";
            //menampilkan nilai prediksi untuk bulan selanjutnya
        } else {
            echo "Terdapat kesalahan pada data, silahkan cek kembali input data time series Anda.";
        }
    }
}


//query untuk mengambil data penjualan


// fungsi beberapa stok
function tambah_stok($conn, $jenis_barang, $jumlah_stok)
{
    $query = "UPDATE tb_stok SET jumlah_stok = jumlah_stok + $jumlah_stok WHERE jenis_barang = '$jenis_barang'";
    mysqli_query($conn, $query);
    $tanggal = date("Y-m-d H:i:s");
    $query_log = "INSERT INTO log_stok (jenis_barang, jumlah_stok, tanggal) VALUES ('$jenis_barang', $jumlah_stok, '$tanggal')";
    mysqli_query($conn, $query_log);
}

function kurangi_stok($conn, $jenis_barang, $jumlah_stok)
{
    $query = "UPDATE tb_stok SET jumlah_stok = jumlah_stok - $jumlah_stok WHERE jenis_barang = '$jenis_barang'";
    mysqli_query($conn, $query);
    $tanggal = date("Y-m-d H:i:s");
    $query_log = "INSERT INTO log_stok (jenis_barang, jumlah_stok, tanggal) VALUES ('$jenis_barang', -$jumlah_stok, '$tanggal')";
    mysqli_query($conn, $query_log);
}

function tambah_barang($conn, $jenis_barang, $jumlah_stok)
{
    $query = "INSERT INTO tb_stok (jenis_barang, jumlah_stok) VALUES ('$jenis_barang','$jumlah_stok')";
    mysqli_query($conn, $query);
    $query_log = "DELETE FROM log_stok WHERE jenis_barang = '$jenis_barang'";
    mysqli_query($conn, $query_log);
}

?>


<div class="container-fluid">
    <h4 class="text-center">Prediksi Penjualan Bulan Depan</h4>
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Prediksi Penjualan Jenis Barang 30</h5>
                    <?php $regresi = new RegresiLinearStok();
                    $regresi->JenisBarang(30); ?>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Prediksi Penjualan Jenis Barang 25</h5>
                    <?php $regresi = new RegresiLinearStok();
                    $regresi->JenisBarang(25); ?>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Prediksi Penjualan Jenis Barang 20</h5>
                    <?php $regresi = new RegresiLinearStok();
                    $regresi->JenisBarang(20); ?>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Prediksi Penjualan Jenis Barang 15</h5>
                    <?php $regresi = new RegresiLinearStok();
                    $regresi->JenisBarang(15); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <h3 class="text-center">Data Stok Barang</h3>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah Stok</th>

                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    include('config.php');
                    $query = "SELECT * FROM tb_stok";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['jenis_barang'] . "</td>";
                            echo "<td>" . $row['jumlah_stok'] . "</td>";

                            echo "<td>"; ?>

                            <a class='btn btn-danger' href='hapus_stok.php?id= <? echo $row['id_stok'] ?> ' role=' button'>Hapus</a>
                    <?php echo "</td>";
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Tambah Stok</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="tambah_stok">Tambahkan Stok</label>
                    <input type="number" name="jumlah_stok" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tambah_stok">jenis_barang</label>
                    <select id="jenis_barang" name="jenis_barang" class="form-control custom-select">
                        <option>30</option>
                        <option>25</option>
                        <option>20</option>
                        <option>15</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="submit_tambah"> Tambah Stok </button>
            </form>
        </div>
    </div>

</div>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Kurangi Stok</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="tambah_stok">Kurang Stok</label>
                    <input type="number" name="jumlah_stok" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tambah_stok">jenis_barang</label>
                    <select id="jenis_barang" name="jenis_barang" class="form-control custom-select">
                        <option>30</option>
                        <option>25</option>
                        <option>20</option>
                        <option>15</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning" name="submit_kurang"> Kurangi Stok </button>
            </form>
        </div>
    </div>

</div>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Submit Barang</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="tambah_stok">Stok Awal</label>
                    <input type="number" name="jumlah_stok" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tambah_stok">jenis_barang</label>
                    <input type="number" name="jenis_barang" class="form-control">
                </div>
                <button type="submit" class="btn btn-success" name="submit_barang">Tambah Barang </button>
            </form>
        </div>
    </div>
</div>
</div>


<?php

include('config.php');
// isset submit per tombol
if (isset($_POST['submit_tambah'])) {
    $nama_barang = $_POST['jenis_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    tambah_stok($conn, $nama_barang, $jumlah_stok);
    $tanggal = date("Y-m-d H:i:s");
    $query_log = "INSERT INTO log_stok (jenis_barang,waktu, jumlah ) VALUES ('$nama_barang', '$tanggal', $jumlah_stok)";
    mysqli_query($conn, $query_log);

    echo ("<script>location.href = 'kelola_stok.php';</script>");
}


if (isset($_POST['submit_kurang'])) {
    $nama_barang = $_POST['jenis_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    kurangi_stok($conn, $nama_barang, $jumlah_stok);
    echo ("<script>location.href = 'kelola_stok.php';</script>");
}


if (isset($_POST['submit_barang'])) {
    $nama_barang = $_POST['jenis_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $tahun = $_POST['tahun'];
    tambah_barang($conn, $nama_barang, $jumlah_stok);
    echo ("<script>location.href = 'kelola_stok.php';</script>");
}




mysqli_close($conn);
?>