<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="input_user.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="user_level">User Level</label>
                        <select id="user_level" name="user_level" required class="form-control custom-select">
                            <option value="admin">Admin</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>
                    <p></p>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama </th>
                                    <th>Nomor HP</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('config.php');
                                $sql = "SELECT * FROM tb_users";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // melakukan loop untuk setiap baris data
                                    // melakukan sesuatu dengan data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id_user"] . "</td>";
                                        echo "<td>" . $row["nama"] . "</td>";
                                        echo "<td>" . $row["no_hp"] . "</td>";
                                        echo "<td>" . $row["username"] . "</td>";
                                        echo "<td>" . $row['level'] . "</td> <td>"
                                ?>

                                        <a class='btn btn-success btn-edit' id="btn-edit" href='edit_user.php?id=<?php echo $row['id_user']; ?>' role='button'>Edit</a>
                                        <a class=' btn btn-danger' href='hapus_user.php?id=<?php echo $row['id_user']; ?>' role='button'>Hapus</a>

                                <?php
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Tidak ada data yang ditemukan.";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container-fluid -->
</section>