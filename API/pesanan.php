<?php
include '../admin/conn/koneksi.php';
header('Content-Type: application/json');

$pembeli = $_POST['id_cust'] ?? '';

$sql = "SELECT pesanan.`id_pesanan`, customer.`id_cust`, produk.`nama_produk`,produk.`berat`,
        produk.`satuan`, produk.`ongkir`, customer.`nama_cust`, pesanan.`status_bayar`, produk.`harga`,
        pesanan.`status_proses` FROM pesanan INNER JOIN produk ON produk.`id_produk` = pesanan.`id_produk`
        INNER JOIN customer ON customer.`id_cust` = pesanan.`id_cust` WHERE customer.`id_cust`= '$pembeli' ";
$result = mysqli_query($koneksi, $sql);

$array = array(); 
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'id_pesanan' => $row['id_pesanan'],
            'id_cust' => $row['id_cust'],
            'nama_produk' => $row['nama_produk'],
            'nama_cust' => $row['nama_cust'],
            'status_bayar' => $row['status_bayar'],
            'status_proses' => $row['status_proses'],
            'satuan' => $row['satuan'],
            'berat' => $row['berat'],
            'harga' => $row['harga'],
        );
        array_push($array, $data);
    }
}

echo json_encode($array);