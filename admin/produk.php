<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "conn/koneksi.php";
    error_reporting(0);
?>
<!-- End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Hasil Laut</title>
</head>
<!-- Fungsi Waktu Session -->
      <?php
				$timeout = 10; // Set timeout minutes
				$logout_redirect_url = "../index.php"; // Set logout URL

				$timeout = $timeout * 60; // Converts minutes to seconds
				if (isset($_SESSION['start_time'])) {
					$elapsed_time = time() - $_SESSION['start_time'];
					if ($elapsed_time >= $timeout) {
						session_destroy();
						echo "<script>alert('Sesi Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
					}
				}
				$_SESSION['start_time'] = time();
				?>
				<?php } ?>
				<!-- End -->
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Sea JaxID</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="produk.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-gift me-2"></i>Produk</a>
                <a href="pesanan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                        class="fas fa-project-diagram me-2"></i>Pesanan</a>
                <a href="pembeli.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user me-2"></i>Pembeli</a>
                <a href="cetak_penjualan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports Penjualan</a>
                        <br>
                <a href="anggota.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user me-2"></i>Anggota</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Produk</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><b><?php echo $_SESSION['panggilan'];?></b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-power-off me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

                <div class="container-fluid row my-5">
                    <h3 class="fs-4 mb-3">Daftar Produk</h3>
                    <div class="col">
                        <a class="btn btn-primary mb-3" href="tambah/produk_tambah.php"><i class="fa fa-plus-square "></i> Tambah Produk</a>
                        <form class="example text-right" method="POST" action="" style="margin:0px;max-width:300px">
                            <input type="text" placeholder="Search" name="cari">
                            <button type="submit"><i class="fa fa-search"></i> cari</button>
                        </form>
                         <?php 
                                $cari = $_POST['cari'];
                            ?>
                        <br>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Ongkir</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Proses</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=0;
                                    if($cari != ''){
                                        $data = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk LIKE '%".$cari."%' or
                                        nama_produk like '%".$cari."%' ");
                                    }else{
                                        $data = mysqli_query($koneksi,"SELECT * FROM produk");
                                    }
                                    
                                    if(mysqli_num_rows($data)){
                                    while($d = mysqli_fetch_array($data)){
                                        $no++;
                                        ?>

                                <tr align="center">
                                    <th scope="row"><?php echo "$no" ?></th>
                                    <td scope="row"><img src="tambah/gambar/<?php echo $d['gambar_nama'] ?>"  width="80px" height="80px" /></td>
                                    <td><?php echo $d['nama_produk']; ?></td>
                                    <td><?php echo $d['ongkir']; ?></td>
                                    <td><?php echo $d['stok']; ?> <?php echo $d['berat']; ?> <?php echo $d['satuan']; ?></td>
                                    <td>Rp. <?php echo $d['harga']; ?>/Kg</td>
                                    <td><?php echo $d['status_produk']; ?></td>
                                    <td>
                                        <a onclick="return confirm ('Aktifkan <?php echo $d['nama_cust'];?>.?');" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Aktifkan Produk" href="edit/aktif.php?hal=hapus&kd=<?php echo $d['id_produk'];?>"><span class="fas fa-arrow-circle-up"> </span></a>
                                        <a onclick="return confirm ('non-aktifkan <?php echo $d['nama_cust'];?>.?');" class="btn btn-sm btn-warning tooltips" data-placement="bottom" data-toggle="tooltip" title="Non Aktifkan Produk" href="edit/nonaktif.php?hal=edit&kd=<?php echo $d['id_produk'];?>"><span class="fas fa-arrow-circle-down"> </span></a>
                                    </td>
                                    <td><div id="thanks">
                                        <a onclick="return confirm ('Yakin hapus <?php echo $d['nama_produk'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Produk" href="hapus/produk_hapus.php?hal=hapus&kd=<?php echo $d['id_produk'];?>"><span class="fa fa-lg fa-trash"> </span></a>
                                        <a onclick="return confirm ('Yakin Edit <?php echo $d['nama_produk'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Edit Produk" href="edit/edit_produk.php?hal=edit&kd=<?php echo $d['id_produk'];?>"><span class="fa fa-lg fa-edit"> </span></a>
                                    </td>
                                </tr>
                                 <?php
                                    }}else{
                                        echo '<tr><td colspan="6" align="center" style="color: red">Data Produk yang dicari Tidak ditemukan <span style="color: black">klik cari untuk menampilkan semua data<span></td></tr>';
                                    }
			                    ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>