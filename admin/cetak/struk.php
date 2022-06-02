<?php 
	include "../conn/koneksi.php";
    $id_pesan = $_GET['kd'];
    ?>
<html>
<head>
<title>Cetak Bukti Bayar</title>
    <style>
    #tabel
    {
    font-size:15px;
    border-collapse:collapse;
    }
    #tabel  td
    {
    padding-left:5px;
    border: 1px solid black;
    }
    </style>
</head>

    <?php 
        $data = mysqli_query($koneksi,"SELECT pesanan.`id_pesanan`,produk.`nama_produk`,produk.`berat`,
        produk.`satuan`, produk.`ongkir`, customer.`nama_cust`,customer.`no_cust`, customer.`alamat_cust`, pesanan.`status_bayar`, produk.`harga`,
        pesanan.`status_proses` FROM pesanan INNER JOIN produk ON produk.`id_produk` = pesanan.`id_produk`
        INNER JOIN customer ON customer.`id_cust` = pesanan.`id_cust` WHERE id_pesanan='$id_pesan'");
        while($d = mysqli_fetch_array($data)){
            ?>


<!--  -->
    <body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
        <span style='font-size:12pt'><b>SEA JAXID</b></span></br>
        Jalan Kaliurang KM 5,8 Gang Pandega Satya no 10 </br>
        Telp : 081208325715
        </td>

        <td style='vertical-align:top' width='30%' align='left'>
        <b><span style='font-size:12pt'><?php echo $d['nama_cust']; ?></span></b></br>
        No Trans. : <?php echo $d['id_pesanan']; ?></br>
        Tanggal : <?php echo date("d-F-Y") ?></br>
        </td>
    </table>
    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
    </br>
    </td>

    <td style='vertical-align:top' width='30%' align='left'>
    No Telp : <?php echo $d['no_cust']; ?>
    </td>
    </table>
    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
    </br>
    </td>

    <td style='vertical-align:top' width='30%' align='left'>
    Alamat : <?php echo $d['alamat_cust']; ?>
    </td>
    </table>

    <br>

    <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
        <tr align='center'>
            <td width='10%'>Kode Pesan</td>
            <td width='20%'>Nama Produk</td>
            <td width='13%'>Harga</td>
            <td width='4%'>Qty</td>
            <td width='7%'>Satuan</td>
            <td width='13%'>Total Harga</td>
        <tr>
            <td>SEA<?php echo $d['id_pesanan']; ?></td>
            <td> <?php echo $d['nama_produk']; ?></td>
            <td>Rp. <?php echo $d['harga']; ?>,00</td>
            <td> <?php echo $d['berat']; ?></td>
            <td> <?php echo $d['satuan']; ?></td>
            <td style='text-align:right'>Rp. <?php echo $d['harga']; ?>,00</td>
        <tr>
            <td colspan = '5'>
                <div style='text-align:right'>Total Di Bayar Adalah : </div>
            </td>
            <td style='text-align:right'>Rp. <?php echo $d['harga']; ?>,00</td>
        </tr>
        <tr>
            <td colspan = '5'><div style='text-align:right'>Kembalian : </div></td><td style='text-align:right'>Rp0,00</td>
        </tr>
        <tr>
            <td colspan = '5'><div style='text-align:right'>DP : </div></td>
            <td style='text-align:right'>Rp0,00</td>
        </tr>
        <tr>
            <td colspan = '5'><div style='text-align:right'>Sisa : </div></td>
            <td style='text-align:right'>Rp0,00</td>
        </tr>
    </table>
    <?php
        }
    ?>
    <table style='width:650; font-size:7pt;' cellspacing='10'>
        <tr>
            <td align='center'>TTD,</br></br>(SEA JAX ID, <?php echo date("d-F-Y") ?>)</td>
        </tr>
    </table>
    </center>
    </body>
</html>