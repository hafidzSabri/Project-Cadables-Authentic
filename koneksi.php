<?php

$koneksi = mysqli_connect("localhost", "root", "", "barang");


// Check connection jika terjadi gagal
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
