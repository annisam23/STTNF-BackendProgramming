<?php
//sebelum pake function
$jari1 = 7;
$phi = 3.14;

$hasil = $phi * pow($jari1, 2);


//memakai function
function hitungLuasLingkaran($jari)
{
    $phi = 3.14;
    $luasLingkaran = $phi * $jari * $jari;
    return $luasLingkaran;
}
echo hitungLuasLingkaran(7);
echo "<br>";
echo hitungLuasLingkaran(28);
