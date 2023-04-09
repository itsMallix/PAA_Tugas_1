<?php
include '../admin/admin_header.php'; 
function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/TUGAS_PAA/api/api_tampil.php");
$data = json_decode($data, TRUE); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/TUGAS_PAA/admin/style.css">
    <!--BS-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<body>
    <section class="produk section">
    <div class="container__table">
        <div class="buat__center">
            <div class="nav__tambah">
                <h3>Data Produk</h3>
            <button class="add__produk">
                <i class="ri-add-line"></i>
                <a href="../readapi/admin_create.php">Tambah Baru</a>
            </button>
            </div>
        </div>
        <div class="table">
            <table  class="table__produk" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Tindakan</th>
                </thead>
                <tbody>
                    <?php foreach ($data as $data) { ?>
                        <tr>
                            <td>
                                <?= $data["id"] ?>
                            </td>
                            <td>
                                <?= $data["nama"] ?>
                            </td>
                            <td>
                                <?= $data["stok"] ?>
                            </td>
                            <td>
                                <?= $data["harga"] ?>
                            </td>
                            <td colspan="2"> 
                                <a class="btn" href="../readapi/admin_edit.php?id=<?= $data['id'] ?>"> Edit </a> 
                                <a class="btn" href="../api/api_hapus.php?id=<?= $data['id'] ?>"> Hapus </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>
</body>
</html>

<style>
    .btn {
        display: inline;
        width: 70px;
        height: 10px;
        background-color: #fff;
        padding: 0 5 0 5;
        margin: 10px;
        text-align: center;
        border-radius: 3px;
        color: black;
        /* font-weight: bold; */
        /* line-height: 25px; */
    }
</style>
