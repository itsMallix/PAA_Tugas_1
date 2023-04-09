<?php
require_once('../config/koneksi.php');

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = $db->prepare("DELETE FROM produk WHERE id=?");
    $sql->bind_param('i', $id);
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
