<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php include('preloader.php') ?>
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php include('logo.php'); ?>
            <!-- Sidebar -->
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include('content_header.php'); ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <!-- /.container-fluid -->
                <?php
                include('config.php');


                $id = $_GET['id'];

                // Query untuk mengambil data dengan ID tertentu
                $query = "SELECT * FROM prediksi_penjualan WHERE id=$id";
                $result = mysqli_query($conn, $query);

                // Ambil data dari hasil query
                $row = mysqli_fetch_assoc($result);

                // Tutup koneksi
                mysqli_close($conn);
                ?>


                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Penjualan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="date" name="month" value="<?php echo $row['month']; ?>" id="month" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">30</label>
                                        <input type="number" name="30" value="<?php echo $row['30']; ?>" id="30" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">25</label>
                                        <input type="number" name="25" value="<?php echo $row['25']; ?>" id="25" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">20</label>
                                        <input type="number" name="20" value="<?php echo $row['20']; ?>" id="20" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">15</label>
                                        <input type="number" name="15" value="<?php echo $row['15']; ?>" id="15" required class="form-control">
                                    </div>

                                    <button type="submit" id="update" name="update" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Data Penjualan Bulanan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <?php
                include('config.php');
                if (isset($_POST['update'])) {
                    $id = $_GET['id'];
                    $month = $_POST['month'];
                    $tigapuluh = $_POST['30'];
                    $dualima = $_POST['25'];
                    $duapuluh = $_POST['20'];
                    $limabelas = $_POST['15'];

                    $sql = "UPDATE `prediksi_penjualan` SET `30`='$tigapuluh' ,`25` ='$dualima',`20`='$duapuluh',`15`='$limabelas',`month`='$month' WHERE id=$id";

                    if (mysqli_query($conn, $sql)) {
                        echo ("<script>location.href = 'tambah_penjualan.php';</script>");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    // Menutup koneksi database
                    mysqli_close($conn);
                }
                ?>
        </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include('script_footer.php'); ?>
</body>

</html>