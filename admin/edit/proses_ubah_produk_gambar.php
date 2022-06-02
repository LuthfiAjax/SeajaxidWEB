<?php 
	include "../conn/koneksi.php";

		$id_produk = $_POST['id_produk'];

		$rand = rand();
		$ekstensi =  array('png','jpg','jpeg');
		$filename = $_FILES['gambar_nama']['name'];
		$ukuran = $_FILES['gambar_nama']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($ext,$ekstensi) ) {
				echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_produk_gambar.php'</script>";
			}else{
				if($ukuran < 1044070){		
					$xx = 'http://jaxid.site/TA/admin/tambah/gambar/'.$rand.'_'.$filename;
					$xy = $rand.'_'.$filename;
					move_uploaded_file($_FILES['gambar_nama']['tmp_name'], '../tambah/gambar/'.$rand.'_'.$filename);
					mysqli_query ($koneksi, "UPDATE produk SET gambar_nama ='$xy', url_gambar='$xx' WHERE id_produk = '$id_produk'");
					header("location:../produk.php?alert=berhasil");
				}else{
					echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_produk_gambar.php'</script>";
				}
			}
	?>