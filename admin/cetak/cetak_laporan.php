<?php 
    include "../conn/koneksi.php";
    $cari = $_GET['cetak'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Cetak Dokumen</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body onload="print()">
    <table width="100%">
        <tr>
            <td width="25" align="center"><h1>SEA JAXID </h1>Cetak Laporan Penjualan Dari pencarian  <b><?= $cari ?><b></td>
        </tr>
    </table>
    <hr>
    <table align="center" class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr align="center" border=1>
                <th scope="col" width="50">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Produk</th>
                <th scope="col">Alamat</th>
                <th scope="col">Berat</th>
                <th scope="col">Netto</th>
                <th scope="col">Laba</th>
            </tr>
        </thead>
        <?php 
             $no=0;
             $data = mysqli_query($koneksi,"SELECT produk.`nama_produk`,produk.`berat`,
                    produk.`satuan`, customer.`nama_cust`, produk.`harga`, customer.`alamat_cust`, produk.`modal`, pesanan.`tgl`
                    FROM pesanan INNER JOIN produk ON produk.`id_produk` = pesanan.`id_produk`
                    INNER JOIN customer ON customer.`id_cust` = pesanan.`id_cust` WHERE nama_produk LIKE '%".$cari."%' OR
                    nama_cust LIKE '%".$cari."%' OR alamat_cust LIKE '%".$cari."%' OR tgl LIKE '%".$cari."%'");
            while($d = mysqli_fetch_array($data)){
                $no++;
                    $harga = $d['harga'];
                    $modal = $d['modal'];
                    $hasil = $harga-$modal;
                    $jumlah = mysqli_num_rows($data);
                    $total = $hasil*$jumlah;
                ?>
        <tbody>
        
            <tr align="center">
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $d['tgl']; ?></td>
                <td><?php echo $d['nama_cust']; ?></td>
                <td><?php echo $d['nama_produk']; ?></td>
                <td><?php echo $d['alamat_cust']; ?></td>
                <td><?php echo $d['berat']; ?> <?php echo $d['satuan']; ?></td>
                <td>Rp. <?php echo $d['harga']; ?></td>
                <td>Rp. <?php echo $hasil ?></td>
            </tr>
            <?php
                }
            ?>
            <tr align="center">
                    <td></td>
                    <td>Total Laba</td>
            </tr>
            <br>
            <tr align="center">
                    <td></td>
                    <td>Rp. <?php echo $total; ?></td>
            </tr>
        </tbody>
    </table>
    <footer>
        <p>SEA JAXID</p>
    </footer>
    <style>
        footer {
                display: flex;
                justify-content: center;
                padding: 5px;
                background-color: #45a1ff;
                color: #fff;
            }
    </style>
</body>
</html>