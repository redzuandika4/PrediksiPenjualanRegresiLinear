<div class="container-fluid">

    <!-- /.card-body -->

</div>
<div class="container-fluid">
    <h2 class="text-center">Prediksi Penjualan Bulan Depan</h2>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"><b> Prediksi Jenis Barang 30</b></h3>
                    <?php include('regresi_prediksi.php');
                    $regresi30 = new RegresiLinearPrediksi();
                    $regresi30->JenisBarang(30);
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"> <b> Prediksi Jenis Barang 25</b></h3>
                <?php
                $regresi30->JenisBarang(25);
                ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"> <b> Prediksi Jenis Barang 20</b></h3>
                <?php
                $regresi30->JenisBarang(20);
                ?>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"> <b> Prediksi Jenis Barang 15</b></h3>
                <?php
                $regresi30->JenisBarang(15);
                ?>
            </div>
        </div>
    </div>
</div>