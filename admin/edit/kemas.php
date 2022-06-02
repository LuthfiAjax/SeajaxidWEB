<?php 
	include "../conn/koneksi.php";

        $id_pesan = $_GET['kd'];
        $status = "Sudah dikemas";

        $sql="UPDATE pesanan SET status_proses ='$status'
        WHERE id_pesanan = '$id_pesan'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../pesanan.php");
        }else{
           echo "<script>alert('Produk gagal dikemas!'); window.location = 'pesanan.php'</script>";	
        }

?>