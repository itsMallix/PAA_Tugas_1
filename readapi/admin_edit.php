<?php
include '../admin/admin_header.php'; 
function http_request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/tugas_paa/api/api_edit.php" . $_GET["id"]);
$data = json_decode($data, TRUE);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Produk</title>
    <link rel="stylesheet" href="/TUGAS_PAA/admin/style.css">
</head>

<body>
    <div class="edit__produk">
    <header class="header__edit">
        <h3>Edit Data Produk</h3>
    </header>
    <div class="edit__label">
        <form action="../api/api_ubah.php" method="post" id="form">
            <div class="form-group">
                <label for="">Kode produk</label>
                <input type="text" value="<?= $data["id"] ?>" name="id" id="id" placeholder="Kode Produk">
            </div>
            <div class="form-group">
                <label for="">Nama produk</label>
                <input type="text" value="<?= $data["nama"] ?>" name="nama" id="nama" placeholder="Nama Produk">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="text" value="<?= $data["stok"] ?>" name="stok" id="stok" placeholder="Stok">
            </div>
        <div class="form-group">
                <label for="">Harga</label>
                <input type="text" value="<?= $data["harga"] ?>" name="harga" id="harga" placeholder="Harga">
            </div>   
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>