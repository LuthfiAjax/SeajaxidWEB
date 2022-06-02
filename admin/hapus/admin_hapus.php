<?php
include "../conn/koneksi.php";
$id_admin = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id_admin'");
if ($query){
	echo "<script>alert('Produk Berhasil dihapus!'); window.location = '../anggota.php'</script>";	
} else {
	echo "<script>alert('Produk Gagal dihapus!'); window.location = '../anggota.php'</script>";	
}
?>