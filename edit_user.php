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
                <?php
                include('config.php');


                $id = $_GET['id'];

                // Query untuk mengambil data dengan ID tertentu
                $query = "SELECT * FROM tb_users WHERE id_user=$id";
                $result = mysqli_query($conn, $query);

                // Ambil data dari hasil query
                $row = mysqli_fetch_assoc($result);

                // Tutup koneksi
                mysqli_close($conn);
                ?>
                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" id="nama" name="nama" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor Hp</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'] ?>" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Isi Password Baru / Sekarang" required>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="update" id="update" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="data_user.php" role="button">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                include('config.php');
                if (isset($_POST['update'])) {
                    $id = $_GET['id'];
                    $nama = $_POST['nama'];
                    $no_hp = $_POST['no_hp'];
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $sql = "UPDATE tb_users SET nama='$nama', no_hp='$no_hp', username='$username', password='$password' WHERE id_user='$id'";
                    mysqli_query($conn, $sql);
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Data Berhasil Di Update');</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                ?>
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