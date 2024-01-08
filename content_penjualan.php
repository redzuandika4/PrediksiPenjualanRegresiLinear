<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penjualan</h3>
                    </div>
                    <p></p>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>30</th>
                                    <th>25</th>
                                    <th>20</th>
                                    <th>15</th>

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
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["month"] . "</td>";
                                        echo "<td>" . $row["30"] . "</td>";
                                        echo "<td>" . $row["25"] . "</td>";
                                        echo "<td>" . $row["20"] . "</td>";
                                        echo "<td>" . $row["15"] . "</td>";
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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Grafik Penjualan Bulanan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.container-fluid -->
</section>