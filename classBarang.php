<?php
class barang {
    var $kdbarang;
    var $namabarang;
    var $qty;
    var $hargaBeli;
    var $hargaJual; 

    
include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, "select * from barang");
while ($d = mysqli_fetch_array($data)) {
?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['NIK']; ?></td>
        <td><?php echo $d['nama_dosen']; ?></td>
        <td><?php echo $d['jenis_kelamin'];?></td>
</tr>



}
?>