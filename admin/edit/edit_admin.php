<?php
	include "../conn/koneksi.php";
?>
<!-- Fungsi Menampilkan Data dari Database -->
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_GET[kd]'");
        $d  = mysqli_fetch_array($query);
        ?>
<!-- End -->	


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="registration-form">
      <form action="proses_ubah_admin.php" method="POST">
        <h1><b>Edit akun Admin</b></h1>
        <div class="form-icon">
          <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
          <label> <h5>Username</h5></label>
          <input type="text" class="form-control" name="username" id="username" placeholder="masukan username" value="<?php echo $d['username']; ?>"/>
        </div>
        <div class="form-group">
          <label> <h5>Password</h5></label>
          <input type="password" class="form-control" name="password" id="password" placeholder="masukan Password" value="<?php echo $d['password']; ?>"/>
        </div>
        <div class="form-group">
          <label> <h5>Nama</h5></label>
          <input type="text" class="form-control" name="panggilan" id="panggilan" placeholder="masukan Nama" value="<?php echo $d['panggilan']; ?>"/>
        </div>
        <div class="form-group">
          <label> <h5>Alamat</h5></label><br>
          <textarea name="alamat" id="alamat" cols="30" rows="3" placeholder="masukan Alamat"><?php echo $d['alamat']; ?></textarea>
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
