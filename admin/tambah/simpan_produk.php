<?php 
	include "../conn/koneksi.php";

		$nama_produk = $_POST['nama_produk'];
		$detail_produk = $_POST['detail_produk'];
		$ongkir = $_POST['ongkir'];
		$satuan = $_POST['satuan'];
		$berat = $_POST['berat'];
		$harga = $_POST['harga'];
		$modal = $_POST['modal'];
		$status = "Aktif";

		$rand = rand();
		$ekstensi =  array('png','jpg','jpeg');
		$filename = $_FILES['gambar_nama']['name'];
		$ukuran = $_FILES['gambar_nama']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($ext,$ekstensi) ) {
				header("location:produk_tambah.php?alert=gagal_ekstensi");
			}else{
				if($ukuran < 1044070){
					$xy = $rand.'_'.$filename;
					$xx = 'https://jaxid.site/TA/admin/tambah/gambar/'.$rand.'_'.$filename;
					move_uploaded_file($_FILES['gambar_nama']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "INSERT INTO produk VALUES (NULL,'$xy','$xx','$nama_produk', '$nama_produk', '$ongkir', '$satuan', '$berat',  '$harga', '$modal', '$status')");
					header("location:../produk.php?alert=berhasil");
				}else{
					header("location:produk_tambah.php?alert=gagal_ukuran");
				}
			}
	?>