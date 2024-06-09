<?php

require_once 'connection.php';

class cadable extends connection {

    protected $data = [];

    function __construct() {
        
    }

    public function tampil_barang() {
        $conn = $this->connection();

        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];        
            $fetch = $conn->query("SELECT * FROM tbBarang WHERE kdBarang LIKE '%$cari%' 
            OR namaBarang LIKE '%$cari%' OR qty LIKE '%$cari%' OR hargaBeli LIKE '%$cari%' OR 
            hargaJual LIKE '%$cari%'");
        } else {
            $fetch = $conn->query("SELECT * FROM tbBarang");
        }

        return $fetch->fetch_all(MYSQLI_ASSOC);
    }

    public function get_detail_barang(int $id) {
        $conn = $this->connection();
        $fetch = $conn->query("SELECT * FROM tbBarang WHERE id = " . $id);
        return $fetch->fetch_assoc();
    }

    public function ubah_barang() {
        $conn = $this->connection();
        if(isset($_REQUEST['btnUbahBarang']) && $_SERVER['REQUEST_METHOD'] === "POST"){

            $id = htmlspecialchars($_REQUEST['id']);
            $kdBarang = htmlspecialchars($_REQUEST['kdBarang']);
            $nmBarang = htmlspecialchars($_REQUEST['namaBarang']);
            $stock = htmlspecialchars($_REQUEST['qty']);
            $hb = htmlspecialchars($_REQUEST['hargaBeli']);
            $hj = htmlspecialchars($_REQUEST['hargaJual']);

            if($id == "" || $kdBarang == "" || $nmBarang == "" || $stock == "" || $hb == "" || $hj == ""){
                die("Error");
            } else {

                $update = $conn->query("UPDATE tbBarang SET kdBarang = '".$kdBarang."', 
                namaBarang = '".$nmBarang."', qty = '".$stock."',
                hargaBeli = '".$hb."', hargaJual = '".$hj. "' WHERE id = ". $id);

                if($update) {
                    echo "
                    <script>
                        alert('Berhasil mengubah data barang')
                        document.location = 'index.php'
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Gagal mengubah data barang')
                        document.location = 'ubah-barang.php?id=$id'
                    </script>
                    ";
                }

            }

        }
    }

    public function tambah_barang() {        
        $conn = $this->connection();
        if(isset($_REQUEST['btnTambahBarang']) && $_SERVER['REQUEST_METHOD'] === "POST"){           
            $kdBarang = htmlspecialchars($_REQUEST['kdBarang']);
            $namaBarang = htmlspecialchars($_REQUEST['namaBarang']);
            $stock = htmlspecialchars($_REQUEST['qty']);
            $hargaBeli = htmlspecialchars($_REQUEST['hargaBeli']);
            $hargaJual = htmlspecialchars($_REQUEST['hargaJual']);

            if($kdBarang == "" || $namaBarang == "" || $qty == "" || $hargaBeli == "" || $hargaJual == ""){
                die("Error");
            } else {

                $insert = $conn->query("insert into tbBarang(`kdBarang`, `namaBarang`, `qty`, `hargaBeli`, `hargaJual`) 
                values('$kdBarang', '$namaBarang', '$qty', '$hargaBeli', '$hargaJual')");

                if($insert) {
                    echo "
                    <script>
                    alert('Berhasil menambahkan data barang')
                    document.location = 'index.php'
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                    alert('Gagal menambahkan data barang')
                    document.location='tambah-barang.php'
                    </script>
                    ";
                }

            }

        }
    }

    public function hapus_barang() {
        $id = htmlspecialchars($_REQUEST['id']);
        $conn = $this->connection();

        $delete = $conn->query("DELETE FROM tbBarang WHERE id = " . $id);
        if($delete){
            echo "
            <script>
                alert('Berhasil menghapus data')
                document.location='index.php'
            </script>
            ";
        }
    }

    public function cari_data(){
        $cari = $_GET['cari'];        
        $conn = $this->connection();

        $query = $conn->query("SELECT * FROM tbBarang WHERE kdBarang LIKE '%$cari%' 
        OR namaBarang LIKE '%$cari%' OR qty LIKE '%$cari%' OR hargaBeli LIKE '%$cari%' OR 
        hargaJual LIKE '%$cari%'")->fetch_all(MYSQLI_ASSOC);
        //print_r($query);
        //exit;
        return $query;
    }

}

?>