<?php 
	include "../conn/koneksi.php";

$nama_cust = $_POST['nama_cust'];
$username = $_POST['username'];
$email_cust = $_POST['email_cust'];
$no_cust = $_POST['no_cust'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];


$sql="INSERT INTO customer VALUES (NULL,'$username','$password','$nama_cust','$email_cust', '$no_cust', '$alamat')";
$add= mysqli_query($koneksi, $sql);
if ($add){
    header("location: ../pembeli.php");
}else{
    echo "<script>alert('Gagal membuat akun Customer!'); window.location = 'pembeli_tambah.php'</script>";
}

?>