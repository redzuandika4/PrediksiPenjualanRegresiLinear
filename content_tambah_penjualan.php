<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Data Penjualan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <?php
            include('config.php');
            $query = mysqli_query($conn, "SELECT max(cast(data_ke as unsigned)) as dataTerbesar FROM prediksi_penjualan");
            $data = mysqli_fetch_array($query);
            $kodeData = $data['dataTerbesar'];
            $kodeData++;
            ?>
            <form action="proses_input.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="data_ke">Data Ke</label>
                        <input type="number" name="data_ke" id="data_ke" value="<?php echo $kodeData; ?>" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Jenis Barang 30</label>
                        <input type="number" name="30" id="30" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Jenis Barang 25</label>
                        <input type="number" name="25" id="25" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Jenis Barang 20</label>
                        <input type="number" name="20" id="20" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bulan">Jenis Barang 15</label>
                        <input type="number" name="15" id="15" required class="form-control">
                    </div>

                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
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
        <?php

        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>

                                    <tr>
                                        <th>Tanggal</th>
                                        <th>30</th>
                                        <th>25</th>
                                        <th>20</th>
                                        <th>15</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('config.php');
                                    $sql = "SELECT * FROM prediksi_penjualan";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // melakukan loop untuk setiap baris data
                                        // melakukan sesuatu dengan data
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["month"] . "</td>";
                                            echo "<td>" . $row["30"] . "</td>";
                                            echo "<td>" . $row["25"] . "</td>";
                                            echo "<td>" . $row["20"] . "</td>";
                                            echo "<td>" . $row["15"] . "</td>";
                                            echo "<td>"; ?>
                                            <a class='btn btn-success' href='edit_penjualan.php?id= <?php echo $row['id'] ?> ' role=' button'>Edit</a>
                                            <a class='btn btn-danger' href='hapus_penjualan.php?id= <?php echo $row['id'] ?> ' role=' button'>Hapus</a>

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
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
<div class="row">
    <div class="col-12">
        <a href="prediksi_penjualan.php" class="btn btn-secondary">Prediksi</a>

    </div>
</div>