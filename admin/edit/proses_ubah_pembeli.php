<?php 
	include "../conn/koneksi.php";

        $id_cust  = $_POST['id_cust'];
        $nama_cust = $_POST['nama_cust'];
		$email_cust = $_POST['email_cust'];
		$no_cust = $_POST['no_cust'];
		$alamat = $_POST['alamat_cust'];


        $sql="UPDATE customer SET nama_cust ='$nama_cust', email_cust='$email_cust', no_cust='$no_cust',  alamat_cust='$alamat'
        WHERE id_cust = '$id_cust'";
        $update=mysqli_query($koneksi, $sql);
        
        if ($update){
            header("location: ../pembeli.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_pembeli.php'</script>";	
        }

?>