<?php

class connection {

    protected $db_host = "localhost";
    protected $db_username = "root";
    protected $db_password = "";
    protected $db_name = "barang";

    public function connection() {
        $conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);

        if($conn->connect_errno) {
            echo "Gagal Terkoneksi ke Database" . $conn->connect_errno;
            exit();
        }

        return $conn;
    }
}
?>