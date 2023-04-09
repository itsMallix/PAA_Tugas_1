<?php
include '../admin/admin_header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Produk</title>
	<link rel="stylesheet" href="/TUGAS_PAA/admin/style.css">
</head>

<body>
	<div class="tambah">
		<header>
			<h3>Tambah Produk</h3>
		</header>
		<form action="../api/api_tambah.php" method="post" id="form">
			
			<fieldset class="fieldset">
			<p>
				<label for="nama">Nama Produk: </label>
				<input type="text" name="nama" placeholder="Nama Produk" id="nama" />
			</p>
			<p>
				<label for="stok">Stok: </label>
				<input type="text" name="stok" id="stok" placeholder="Stok" aria-describedby="helpId"></textarea>
			</p>
			<p>
				<label for="harga">Harga: </label>
				<input type="text" name="harga" id="harga" placeholder="Harga" aria-describedby="helpId"></div>
			</p>
			<button class="add__produk1">
				<input type="submit" value="Tambah" name="tambah"/></a>
            </button>
			
			</fieldset>
		
		</form>
	</div>
	</body>
</html>
