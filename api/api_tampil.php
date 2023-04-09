<?php
header('Content-Type: application/json');
require_once('../config/koneksi.php');
$myArray = array();
if ($result = mysqli_query($db, "SELECT * FROM produk ORDER BY id ASC")) {
    	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        	$myArray[] = $row;
    	}
	mysqli_close($db);
    	echo json_encode($myArray);
}