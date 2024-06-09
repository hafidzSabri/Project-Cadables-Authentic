<?php

require_once 'cadable.php';

$cadable = new cadable();
$tambah_barang = $cadable->tambah_barang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="cadables.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Produk</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tambah Produk Cadable Authentic</h5>
                        </div>
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="">Kode Barang</label>
                                <input type="number" name="kodeBarang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="namaBarang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">QTY</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Beli</label>
                                <input type="number" name="hargaBeli" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Jual</label>
                                <input type="number" name="hargaJual" class="form-control" required>
                            </div>                            
                        </div>    
                        <div class="card-footer">
                            <a href="index.php" name="btnCancelTambahBarang" class="btn btn-danger">Batal</a>
                            <button type="submit" name="btnTambahBarang" class="btn btn-primary">Simpan</button>
                        </div>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>