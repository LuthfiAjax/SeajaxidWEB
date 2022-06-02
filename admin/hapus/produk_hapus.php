<?php
include "../conn/koneksi.php";
$id_pesan = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id_pesan'");
if ($query){
	echo "<script>alert('Produk Berhasil dihapus!'); window.location = '../produk.php'</script>";	
} else {
	echo "<script>alert('Produk Gagal dihapus!'); window.location = '../produk.php'</script>";	
}
?>