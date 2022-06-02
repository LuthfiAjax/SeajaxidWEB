<?php 
	include "../conn/koneksi.php";

        $username  = $_POST['username'];
        $password = $_POST['password'];
		$panggilan = $_POST['panggilan'];
		$alamat = $_POST['alamat'];


        $sql="UPDATE admin SET username ='$username', password='$password', panggilan='$panggilan',  alamat='$alamat'
        WHERE username = '$username'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../anggota.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_admin.php'</script>";	
        }

?>