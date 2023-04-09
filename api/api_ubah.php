<?php
require_once('../config/koneksi.php');

if (isset($_POST['id'])) {
    $id                 = $_POST['id'];
    $nama               = $_POST['nama'];
    $stok               = $_POST['stok'];
    $harga              = $_POST['harga'];

    //$sql = "UPDATE produk SET nama='$nama', stok='$stok', harga='$harga' WHERE id=$id";
    $sql = $db->prepare("UPDATE produk SET nama=?, stok=?, harga=? WHERE id=$id");
    $sql->bind_param('sdd', $nama,  $stok, $harga);
    $sql->execute();
    if ($sql) {
        //echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:../readapi/admin_read.php");
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
} else {
    echo "GAGAL";
}
