<?php
include "connection.php";
header('Content-Type: application/json');

if($_POST){

    //POST DATA
	$id_produk      = $_POST['id_produk'];
	$id_cust        = $_POST['id_cust'];
	$tujuan 		= $_POST['tujuan'];
	$status_bayar 	= $_POST['status_bayar'];
	$status_proses 	= $_POST['status_proses'];

    $response = [];

    $insertAccount = 'INSERT INTO pesanan (id_produk, id_cust, tujuan, status_bayar, status_proses) 
                        VALUES (:id_produk, :id_cust, :tujuan, :status_bayar, :status_proses)';
    $statement = $connection->prepare($insertAccount);

    try{
        //Eksekusi statement db
        $statement->execute([
            ':id_produk' => $id_produk,
            ':id_cust' => $id_cust,
            ':tujuan' => $tujuan,
            ':status_bayar' => $status_bayar,
            ':status_proses' => $status_proses
        ]);

        //Beri response
        $response['status']= true;
        $response['message']='Berhasil Melakukan Pembelian';
        $response['data'] = [
            'id_produk' => $id_produk,
            'id_cust' => $id_cust,
            'tujuan' => $tujuan,
            'status_bayar' => $status_bayar,
            'status_proses' => $status_proses
        ];
    } catch (Exception $e){
        die($e->getMessage());
    }

    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print JSON
    echo $json;
}