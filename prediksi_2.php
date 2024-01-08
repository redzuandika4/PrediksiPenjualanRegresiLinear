<?php
// create a database connection
$host = 'localhost';
$dbname = 'regresi';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// load data from the database
$stmt = $pdo->prepare('SELECT month, 30,25,20,15 FROM prediksi_penjualan');
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// define the linear regression function
function linear_regression($x, $y)
{
    $n = count($x);
    $sum_x = array_sum($x);
    $sum_y = array_sum($y);
    $sum_xy = 0;
    $sum_xx = 0;

    for ($i = 0; $i < $n; $i++) {
        $sum_xy += ($x[$i] * $y[$i]);
        $sum_xx += ($x[$i] * $x[$i]);
    }

    $slope = (($n * $sum_xy) - ($sum_x * $sum_y)) / (($n * $sum_xx) - ($sum_x * $sum_x));
    $intercept = ($sum_y - ($slope * $sum_x)) / $n;

    return array($slope, $intercept);
}

// extract the features and target variables
$X = array_column($data, 'month');
$y_product_1 = array_column($data, '30');
$y_product_2 = array_column($data, '25');
$y_product_3 = array_column($data, '20');
$y_product_4 = array_column($data, '15');

// create linear regression models for each product
$model_product_1 = linear_regression($X, $y_product_1);
$model_product_2 = linear_regression($X, $y_product_2);
$model_product_3 = linear_regression($X, $y_product_3);
$model_product_4 = linear_regression($X, $y_product_4);

// predict sales for the next 3 months
$next_months = array('2023-04', '2023-05', '2023-06');
$next_month_values = array(
    strtotime($next_months[0]) - strtotime($X[0]) + 1,
    strtotime($next_months[1]) - strtotime($X[0]) + 1,
    strtotime($next_months[2]) - strtotime($X[0]) + 1
);
$predictions_product_1 = array();
$predictions_product_2 = array();
$predictions_product_3 = array();
$predictions_product_4 = array();

foreach ($next_month_values as $value) {
    $predictions_product_1[] = $model_product_1[0] * $value + $model_product_1[1];
    $predictions_product_2[] = $model_product_2[0] * $value + $model_product_2[1];
    $predictions_product_3[] = $model_product_3[0] * $value + $model_product_3[1];
    $predictions_product_4[] = $model_product_4[0] * $value + $model_product_4[1];
}

// print the predictions
echo "Predictions for the next 3 months:\n";
echo "Month\tProduct 1\tProduct 2\tProduct 3\tProduct 4\n";

for ($i = 0; $i < count($next_months); $i++) {
    echo $next_months[$i] . "\t";
    echo round($predictions_product_1[$i], 2) . "\t\t";
    echo round($predictions_product_2[$i], 2) . "\t\t";
    echo round($predictions_product_3[$i], 2) . "\t\t";
    echo round($predictions_product_4[$i], 2) . "\n";
}
