<?php
include "../conn/koneksi.php";
$id_cust = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM customer WHERE id_cust='$id_cust'");
if ($query){
	echo "<script>alert('Produk Berhasil dihapus!'); window.location = '../pembeli.php'</script>";	
} else {
	echo "<script>alert('Produk Gagal dihapus!'); window.location = '../id_cust.php'</script>";	
}
?>