<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="registration-form">
      <form action="simpan_produk.php" method="POST" enctype="multipart/form-data">
        <h1><b>Tambah Produk hasil laut</b></h1>
        <div class="form-icon">
          <span><i class="fas fa-store"></i></span>
        </div>
        <div class="form-group">
          <label> <h5>Nama Barang</h5></label>
          <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="masukan Nama Barang hasil laut" />
        </div>
        <div class="form-group">
          <label> <h5>Detail Barang</h5></label><br>
          <textarea name="detail_produk" id="detail_produk" cols="40" rows="3" placeholder="masukan detail hasil laut"></textarea>
        </div>
        <div class="form-group">
          <label> <h5>Unggah foto produk</h5></label>
          <input type="file" class="form-control" name="gambar_nama" id="gambar_nama" />
        </div>
        <div class="form-group">
          <label> <h5>Pilih Ongkir</h5></label>
          <select class="form-control" name="ongkir" id="ongkir">
            <option value="Termasuk Ongkir">Termasuk Ongkir</option>
            <option value="Tidak Termasuk Ongkir">Tidak Termasuk Ongkir</option>
          </select>
        </div>
        <div class="form-group">
          <label> <h5>Satuan Berat</h5></label>
          <input readonly="readonly" type="text" class="form-control" name="satuan" id="satuan" value="Kilogram"/>
        </div>
        <div class="form-group">
          <label> <h5>Stok Barang</h5></label>
          <input type="number" class="form-control" name="berat" id="berat" />
        </div>
        <div class="form-group">
          <label> <h5>Harga Barang</h5></label>
          <input type="number" class="form-control" name="harga" id="harga" />
        </div>
        <div class="form-group">
          <label> <h5>Modal Beli Barang</h5></label>
          <input type="number" class="form-control" name="modal" id="modal" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block create-account">Simpan</button>
          <button type="reset" class="btn btn-block btn-warning">RESET</button>

        </div>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
