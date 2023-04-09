<?php
require_once('../config/koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $SQL = $db->prepare("SELECT * FROM produk WHERE id=? ORDER BY id ASC");
    $SQL->bind_param("i", $id);
    $SQL->execute();
    $hasil = $SQL->get_result();
    $myArray = array();
    while ($users = $hasil->fetch_array(MYSQLI_ASSOC)) {
        $myArray = $users;
    }
    echo json_encode($myArray);
} else {
    echo "data tidak ditemukan";
}
