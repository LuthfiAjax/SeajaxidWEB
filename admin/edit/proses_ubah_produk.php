<?php 
	include "../conn/koneksi.php";

        $id_produk  = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
		$detail_produk = $_POST['detail_produk'];
		$ongkir = $_POST['ongkir'];
		$satuan = "Kilogram";
		$berat = $_POST['berat'];
		$harga = $_POST['harga'];
		$modal = $_POST['modal'];


        $sql="UPDATE produk SET nama_produk ='$nama_produk', detail_produk='$detail_produk', ongkir='$ongkir',  satuan='$satuan', berat='$berat', harga='$harga', modal='$modal'
        WHERE id_produk = '$id_produk'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_produk.php'</script>";	
        }

?>