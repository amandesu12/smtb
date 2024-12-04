<?php
$array = array("apel", "jeruk", "pisang", "mangga");

foreach ($array as $buah) {
    echo $buah . "\n";
}
?><?php
// Mendefinisikan array asosiatif
$hargaBuah = array(
    "Apel" => 10000,
    "Pisang" => 5000,
    "Jeruk" => 7000,
    "Mangga" => 8000
);

// Menggunakan foreach untuk iterasi melalui array asosiatif
foreach ($hargaBuah as $buah => $harga) {
    echo "Harga " . $buah . " adalah Rp " . $harga . "<br>";
}
?>