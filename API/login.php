<?php

include '../admin/conn/koneksi.php';
header('Content-Type: application/json');

$username = $_POST["post_username"];
$password = $_POST["post_password"];

$query = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if ($data) {
    echo json_encode(
        array(
            'respone'=> true,
            'payload'=> array(
                "ID" => $data["id_cust"],
                "username" => $data["username"],
                "nama" => $data["nama_cust"],
                "email" => $data["email_cust"],
                "No HP" => $data["no_cust"],
                "Alamat" => $data["alamat_cust"]
            )
        )
    );
}else{
    echo json_encode(
        array(
            'respone'=> False,
            'payload'=> null
        )
    );
}