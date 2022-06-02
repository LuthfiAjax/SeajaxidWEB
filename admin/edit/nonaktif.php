<?php 
	include "../conn/koneksi.php";

        $id_produk = $_GET['kd'];
        $status = "Non-Aktif";

        $sql="UPDATE produk SET status_produk ='$status'
        WHERE id_produk = '$id_produk'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Produk gagal dikemas!'); window.location = 'produk.php'</script>";	
        }

?>