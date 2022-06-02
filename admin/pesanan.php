<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "conn/koneksi.php";
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
                <a href="produk.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Produk</a>
                <a href="pesanan.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                    <h2 class="fs-2 m-0">Pesanan</h2>
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
                    <h3 class="fs-4 mb-3">Daftar Pesanan</h3>
                    <div class="col">
                        <form class="example text-right" method="POST" action="" style="margin:0px;max-width:300px">
                            <input type="text" placeholder="Search" name="cari Pesanan">
                            <button type="submit"><i class="fa fa-search"></i> cari</button>
                        </form>
                        <br>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col">Produk</th>
                                    <th scope="col">Pembeli</th>
                                    <th scope="col">Berat</th>
                                    <th scope="col">Ongkir</th>
                                    <th scope="col">Tagihan</th>
                                    <th scope="col">Status bayar</th>
                                    <th scope="col">Konfrimasi</th>
                                    <th scope="col">Status proses</th>
                                    <th scope="col">Proses</th>
                                    <th scope="col">struk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data = mysqli_query($koneksi,"SELECT pesanan.`id_pesanan`,produk.`nama_produk`,produk.`berat`,
                                    produk.`satuan`, produk.`ongkir`, customer.`nama_cust`, pesanan.`status_bayar`, produk.`harga`,
                                    pesanan.`status_proses` FROM pesanan INNER JOIN produk ON produk.`id_produk` = pesanan.`id_produk`
                                    INNER JOIN customer ON customer.`id_cust` = pesanan.`id_cust`");
                                    while($d = mysqli_fetch_array($data)){
                                        ?>
                                <tr align="center">
                                    <td><?php echo $d['nama_produk']; ?></td>
                                    <td><?php echo $d['nama_cust']; ?></td>
                                    <td><?php echo $d['berat']; ?> <?php echo $d['satuan']; ?></td>
                                    <td><?php echo $d['ongkir']; ?></td>
                                    <td>Rp. <?php echo $d['harga']; ?></td>
                                    <td><?php echo $d['status_bayar']; ?></td>
                                    <td>
                                        <a onclick="return confirm ('Konfrimasi Pembayaran pesanan ( <?php echo $d['nama_cust'];?> ) telah Lunas ?');" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Pembayaran" href="edit/bayar.php?hal=cetak&kd=<?php echo $d['id_pesanan'];?>"><span class="fas fa-credit-card"> </span></a>
                                    </td>
                                    <td><span class="btn btn-sm btn-info tooltips"><?php echo $d['status_proses']; ?></span></td>
                                    <td>
                                        <a onclick="return confirm ('Kirim Pesanan Dari <?php echo $d['nama_cust'];?>.?');" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Kirim Pesanan" href="edit/kirim.php?hal=hapus&kd=<?php echo $d['id_pesanan'];?>"><span class="fas fa-car-side"> </span></a>
                                        <a onclick="return confirm ('Kemas Pesanan dari <?php echo $d['nama_cust'];?>.?');" class="btn btn-sm btn-warning tooltips" data-placement="bottom" data-toggle="tooltip" title="Kemas Pesanan" href="edit/kemas.php?hal=edit&kd=<?php echo $d['id_pesanan'];?>"><span class="fas fa-box"> </span></a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm ('Yakin Cetak resi Pesanan <?php echo $d['nama_cust'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Cetak struk " target="_blank" href="cetak/struk.php?hal=cetak&kd=<?php echo $d['id_pesanan'];?>"><span class="fas fa-print"> </span></a>
                                    </td>
                                </tr>
                                <?php
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