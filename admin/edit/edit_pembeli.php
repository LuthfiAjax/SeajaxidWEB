<?php
	include "../conn/koneksi.php";
?>
<!-- Fungsi Menampilkan Data dari Database -->
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_cust='$_GET[kd]'");
        $d  = mysqli_fetch_array($query);
        ?>
<!-- End -->	

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Pembeli</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="registration-form">
      <form action="proses_ubah_pembeli.php" method="POST">
        <h1><b>Edit Akun Pembeli</b></h1>
        <div class="form-icon">
          <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
          <label> <h5>ID Pembeli</h5></label>
          <input readonly="readonly" type="text" class="form-control" name="id_cust" id="id_cust"  value="<?php echo $d['id_cust']; ?>" placeholder="masukan Nama Barang hasil laut" />
        </div>
        <div class="form-group">
          <label> <h5>Nama</h5></label>
          <input type="text" class="form-control" name="nama_cust" id="nama_cust" placeholder="masukan Nama"  value="<?php echo $d['nama_cust']; ?>" />
        </div>
        <div class="form-group">
          <label> <h5>Email</h5></label>
          <input type="text" class="form-control" name="email_cust" id="email_cust" placeholder="masukan Email"  value="<?php echo $d['email_cust']; ?>" />
        </div>
        <div class="form-group">
          <label> <h5>Nomor Telphone</h5></label>
          <input type="text" class="form-control" name="no_cust" id="no_cust" placeholder="masukan Nomor Telphone"  value="<?php echo $d['no_cust']; ?>"/>
        </div>
        <div class="form-group">
          <label> <h5>Alamat</h5></label><br>
          <textarea name="alamat_cust" id="alamat" cols="30" rows="3" placeholder="masukan Alamat"> <?php echo $d['alamat_cust']; ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block create-account">Update Account</button>
        </div>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
