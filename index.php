<?php

require_once 'cadable.php';
$cadable = new cadable();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="cadables.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadable's Authentic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center pt-4">DATA PRODUK<img src="cadables.png" class="image" alt="" width="250" /></h2>
                <hr>
                <a href="tambah-barang.php" class="btn btn-primary mb-2">Tambah</a>
                
                <form method="GET" autocomplete="off">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group mb-4">
                                <input type="search" name="cari" id="cari" class="form-control" required>
                            </div>
                        </div>                    
                        <div class="col-md-2">
                            <button type="submit" name="CariData" class="btn btn-secondary">Cari Data</button>
                        </div>
                    </div>
                </form>

                <a href="index.php">Reset Pencarian</a>

                <table class="table table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th width=50 style="vertical-align: middle;" class="text-center">No</th>
                            <th style="vertical-align: middle;" class="text-center">Kode Produk</th>
                            <th style="vertical-align: middle;" class="text-center">Nama Produk</th>
                            <th style="vertical-align: middle;" class="text-center">QTY</th>
                            <th style="vertical-align: middle;" class="text-center">Harga Beli</th>
                            <th style="vertical-align: middle;" class="text-center">Harga Jual</th>
                            <th style="vertical-align: middle;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tb-data">
                        <?php
                        $no = 1;
                        foreach($cadable->tampil_barang() as $row){                        
                        ?>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;"><?= $no++ ?></th>
                            <td style="vertical-align: middle;"><?= $row['kdBarang'] ?></td>
                            <td style="vertical-align: middle;"><?= $row['namaBarang'] ?></td>
                            <td style="vertical-align: middle;" class="text-center"><?= $row['qty'] ?></td>
                            <td style="vertical-align: middle;" class="text-center"><?= $row['hargaBeli'] ?></td>
                            <td style="vertical-align: middle;" class="text-center"><?= $row['hargaJual'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdown-menus" data-bs-toggle="dropdown" aria-expanded="false">                                       
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-menus">
                                        <li><a class="dropdown-item btnHapus" href="#" data-id="<?= $row['id'] ?>" 
                                        data-nama_produk="<?= $row['namaBarang'] ?>">Hapus</a></li>
                                        <li><a class="dropdown-item" href="ubah-barang.php?id=<?= $row['id'] ?>">Ubah</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS DATA -->
    <form method="post">
        <div id="modal-hapus-data" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <p>Apakah anda yakin ingin menghapus <span id="nama_produk" style="font-weight:bold;"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Gajadi</button>
                        <button type="submit" name="HapusData" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php 
        if(isset($_REQUEST['HapusData'])){
            $cadable->hapus_barang();
        }

        if(isset($_REQUEST['CariData'])){
            $cadable->tampil_barang();
        }
    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        $('#tb-data').on('click', '.btnHapus', function(){
            const data = {
                id: $(this).data('id'),
                nama_barang: $(this).data('nama_produk')
            }
            
            $('#modal-hapus-data input[name="id"]').val(data.id)
            $('#modal-hapus-data span#nama_produk').text(data.nama_barang)
            $('#modal-hapus-data').modal('show')
        })

    })
</script>
</html>