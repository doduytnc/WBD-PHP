<?php
//Cho 1 so, tinh tong cua day so cua so do tru di 1
function tinhTongDonGian($number) {
    $ketQua = 0;
    $i = $number;
    while ($i>0) {
        $ketQua = $ketQua + $i;
        $i--;
    }
    echo $ketQua;
}
  tinhTongDonGian(70)  ;

$string = "Hello my world";
$words = explode(' ',$string);
$maxLength = 0;
foreach ($words as $key => $word) {
    $temporaryLength = strlen($word);
    if ($temporaryLength > $maxLength) {
        echo $word;
    }
}

 ?>