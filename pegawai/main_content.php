<div class="container-fluid">
    <?php

    include('Peringatan.php');
    Peringatan(30);
    Peringatan(25);

    Peringatan(20);
    Peringatan(15);
    ?>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <?php
                    include('config.php');
                    $sql = "SELECT COUNT(*) as jumlah FROM prediksi_penjualan";
                    $result = mysqli_query($conn, $sql);

                    // Memeriksa apakah query berhasil dijalankan
                    if (mysqli_num_rows($result) > 0) {
                        // Membaca data hasil query
                        $row = mysqli_fetch_assoc($result);
                        echo "<h3>" . $row["jumlah"] . "</h3>";
                    } else {
                        echo "Tidak ada data";
                    }

                    ?>

                    <p>Jumlah Data Penjualan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <?php
                    include('config.php');
                    $sql = "SELECT SUM(jumlah_stok) as jumlah FROM tb_stok";
                    $result = mysqli_query($conn, $sql);

                    // Memeriksa apakah query berhasil dijalankan
                    if (mysqli_num_rows($result) > 0) {
                        // Membaca data hasil query
                        $row = mysqli_fetch_assoc($result);
                        echo "<h3>" . $row["jumlah"] . "</h3>";
                    } else {
                        echo "Tidak ada data";
                    }

                    ?>
                    <p>Jumlah Stok Keseluruhan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                    include('config.php');
                    $sql2 = "SELECT COUNT(*) as jumlah FROM tb_users";
                    $result = mysqli_query($conn, $sql2);

                    // Memeriksa apakah query berhasil dijalankan
                    if (mysqli_num_rows($result) > 0) {
                        // Membaca data hasil query
                        $row = mysqli_fetch_assoc($result);
                        echo "<h3>" . $row["jumlah"] . "</h3>";
                    } else {
                        echo "Tidak ada data";
                    }

                    ?>

                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>4</h3>

                    <p>Tipe Barang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <p>Prediksi Jenis Barang 30 Bulan Depan</p>

                    <?php include('regresi.php');
                    $regresi30 = new RegresiLinear();
                    $regresi30->JenisBarang(30);
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <p>Prediksi Jenis Barang 25 Bulan Depan</p>

                    <?php $regresi30->JenisBarang(25);  ?>

                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <p>Prediksi Jenis Barang 20 Bulan Depan</p>

                    <?php $regresi30->JenisBarang(20);  ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <p>Prediksi Jenis Barang 15 Bulan Depan</p>

                    <?php $regresi30->JenisBarang(15);  ?>
                </div>
            </div>
        </div>

        <?php


        ?>

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
    </div>
    <div class="card-body pt-0">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>

    </div>