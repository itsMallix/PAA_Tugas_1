<?php
header('Content-Type: application/json');
require_once('../config/koneksi.php');

if (isset($_POST['nama']) && isset($_POST['stok']) && isset($_POST['harga'])) {
	$nama		  	= $_POST['nama'];
	$stok 			= $_POST['stok'];
	$harga 			= $_POST['harga'];
	$sql = $db->prepare("INSERT INTO produk (nama,stok, harga) VALUES (?, ?, ?)");
	$sql->bind_param('sdd', $nama, $stok,$harga);
	$sql->execute();
	if ($sql) {
		echo json_encode(array('RESPONSE' => 'SUCCESS'));
		header("location:../readapi/admin_read.php");
	} else {
		echo json_encode(array('RESPONSE' => 'FAILED'));
	}
} else {
	echo "GAGAL";
}
