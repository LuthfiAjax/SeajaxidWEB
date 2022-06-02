<?php
	include "../conn/koneksi.php";
?>
<!-- Fungsi Menampilkan Data dari Database -->
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[kd]'");
        $d  = mysqli_fetch_array($query);
        ?>
<!-- End -->	

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="registration-form">
      <form action="proses_ubah_produk_gambar.php" method="POST"  enctype="multipart/form-data">
        <h1><b>Ubah Gambar Produk hasil laut</b></h1>
        <div class="form-icon">
          <span><i class="fas fa-store"></i></span>
        </div>
        <div class="form-group">
          <label> <h5>ID Barang</h5></label>
          <input readonly="readonly" type="text" class="form-control" name="id_produk" id="id_produk"  value="<?php echo $d['id_produk']; ?>" placeholder="masukan Nama Barang hasil laut" />
        </div>
        <div class="form-group">
          <label> <h5>Nama Barang</h5></label>
          <input  readonly="readonly" type="text" class="form-control" name="nama_produk" id="nama_produk"  value="<?php echo $d['nama_produk']; ?>" placeholder="masukan Nama Barang hasil laut" />
        </div>
        <div >
          <label> <h5>Gambar Barang Saat ini</h5></label><br>
          <img src="../tambah/gambar/<?php echo $d['gambar_nama'] ?>"  width="120" height="120" />
        </div>
        <br>
        <div class="form-group">
          <label> <h5>Unggah foto produk yang Baru</h5></label>
          <input type="file" class="form-control" name="gambar_nama" id="gambar_nama" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block create-account mb-3">Simpan</button>
          </div>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
