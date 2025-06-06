<?php
// Tính S(n) = 1 + 2 + 3 + … + n

function sum($n){

    $s = 0;

    for ($i = 1; $i<=$n; $i++){

        $s += $i;

    }
    return $s;
}

function sums($n){

    $s = 0;
    $i = 1;

    while ($i<=$n){

        $s += $i;
        $i++;

    }

    return $s;
}


$n=3;
$s1 = sum($n);

echo "Tổng giá  S($n) là " .$s1 .'<br>';

$n=5;
$s2 = sum($n);

echo "Tổng giá  S($n) là " .$s2 .'<br>';

$n=3;
$s3 = sums($n);

echo "Tổng giá  S($n) là " .$s3 .'<br>';

$n=5;
$s4 = sums($n);

echo "Tổng giá  S($n) là " .$s4 ;

?>