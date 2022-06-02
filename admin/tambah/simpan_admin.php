<?php 
	include "../conn/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$panggilan = $_POST['panggilan'];
$alamat = $_POST['alamat'];


$sql="INSERT INTO admin_toko VALUES ('$username','$password','$panggilan','$alamat')";
$add= mysqli_query($koneksi, $sql);
if ($add){
    header("location: ../anggota.php");
}else{
    echo "<script>alert('Gagal menambah akun Admin!'); window.location = 'anggota_tambah.php'</script>";
}

?>