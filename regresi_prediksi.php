<?php
//koneksi ke database
class RegresiLinearPrediksi
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


            echo "<table class='table' >";
            echo "<thead>";
            echo "<th>  Prediksi </th> ";
            echo "<th> Eror MAPE</th> ";
            echo "<th> MSE</th> ";
            echo "<th> RMSE</th> ";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td> <h4> <b>" . $prediksi_fix . "</b> </h4> </td>";
            echo "<td> <h4> <b>" . round($mape, 2) . "%" . "</b></h4> </td>";
            echo "<td> <h4> <b>" . round($mse) . "</b></h4> </td>";
            echo "<td> <h4> <b>" . round($rmse) . "</b></h4> </td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";

            //menampilkan nilai prediksi untuk bulan selanjutnya
        } else {
            echo "Terdapat kesalahan pada data, silahkan cek kembali input data time series Anda.";
        }
    }
}






//query untuk mengambil data penjualan
