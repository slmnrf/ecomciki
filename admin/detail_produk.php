<?php 
include '../koneksi.php';

$kd_produk = $_POST['q'];

$sql = $con->query("SELECT * FROM produk WHERE kd_produk='$kd_produk'");
$row = $sql->fetch();
$noUrut = 1;

echo "

<div>
    <b style='font-size: 18px;'>Deskripsi Barang</b>
    <div style='float: right;'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    </div>
</div> <hr>";
echo $row['deskripsi'];
?>