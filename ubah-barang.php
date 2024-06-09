<?php

require_once 'cadable.php';
$id = !filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) ? die("ID Harus integer") : filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$cadable = new cadable();
$fetch = $cadable->get_detail_barang($id);
$ubah_barang = $cadable->ubah_barang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="cadables.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ubah Produk</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ubah Produk Cadable Authentic</h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?= $fetch['id'] ?>">
                            <div class="form-group">
                                <label for="">Kode Barang</label>
                                <input type="number" name="kodeBarang" value="<?= $fetch['kodeBarang'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Nama Barang</label>
                                <input type="text" name="namaBarang" value="<?= $fetch['namaBarang'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">QTY</label>
                                <input type="number" name="qty" value="<?= $fetch['qty'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Harga Beli</label>
                                <input type="number" name="hargaBeli" value="<?= $fetch['hargaBeli'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Harga Jual</label>
                                <input type="number" name="hargaJual" value="<?= $fetch['hargaJual'] ?>" class="form-control" required>
                            </div>                           
                        </div>
                        <div class="card-footer">
                            <a href="index.php" name="btnBatalUbah" class="btn btn-danger">Batal</a>
                            <button type="submit" name="btnUbahBarang" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>