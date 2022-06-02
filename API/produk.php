<?php
include 'connection.php';
header('Content-Type: application/json');

$sql = "SELECT * FROM produk";
$result = mysqli_query($koneksi, $sql);

$array = array();
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'id_produk' => $row['id_produk'],
            'url_gambar' => $row['url_gambar'],
            'nama_produk' => $row['nama_produk'],
            'detail_produk' => $row['detail_produk'],
            'ongkir' => $row['ongkir'],
            'satuan' => $row['satuan'],
            'berat' => $row['berat'],
            'harga' => $row['harga'],
        );
        array_push($array, $data);
    }
}

echo json_encode($array);