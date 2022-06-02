<?php 
	include "../conn/koneksi.php";

        $id_pesan = $_GET['kd'];
        $status = "Lunas";

        $sql="UPDATE pesanan SET status_bayar ='$status'
        WHERE id_pesanan = '$id_pesan'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../pesanan.php");
        }else{
           echo "<script>alert('Gagal Merubah status bayar'); window.location = 'pesanan.php'</script>";	
        }

?>