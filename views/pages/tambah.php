<?php
include '../../config/db.php';
if(isset($_POST['simpan'])){
  $bc=$_POST['barcode']; $nm=$_POST['nama']; $rak=(int)$_POST['rak']; $stok=(int)$_POST['stok']; $min=(int)$_POST['min'];
  mysqli_query($conn,"INSERT INTO produk(barcode,nama_barang,rak_id,stok,stok_minimum) VALUES('$bc','$nm',$rak,$stok,$min)");
  header("Location: daftar.php"); exit;
}
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Tambah</title>
<link rel="stylesheet" href="../../public/css/style.css">
</head><body>
<nav class="navbar"><div>💻 GUDANG KOMPUTER</div><div><a style="color:white;text-decoration:none;margin-left:10px" href="../../public/index.php">Scan</a><a style="color:white;text-decoration:none;margin-left:10px" href="daftar.php">Daftar</a></div></nav>
<div class="container"><div class="card"><h2>➕ Tambah Barang Baru</h2>
<form method="POST">
<label>Barcode</label><input name="barcode" placeholder="880123400009" required>
<label>Nama Barang</label><input name="nama" placeholder="Contoh: Mouse Gaming" required>
<label>Rak</label><select name="rak"><option value="1">RAK-A Aksesoris</option><option value="2">RAK-B Komponen PC</option><option value="3">RAK-C Laptop & Monitor</option></select>
<label>Stok Awal</label><input type="number" name="stok" value="10" required>
<label>Stok Minimum</label><input type="number" name="min" value="2" required>
<button class="btn btn-green" name="simpan">Simpan Barang</button>
</form></div></div></body></html>