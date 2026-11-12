<?php include '../../config/db.php'; ?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Daftar</title>
<link rel="stylesheet" href="../../public/css/style.css">
<link rel="stylesheet" href="../../public/css/gudang.css">
</head><body>
<nav class="navbar">
  <div>💻 GUDANG KOMPUTER</div>
  <div><a style="color:white;text-decoration:none;margin-left:10px" href="../../public/index.php">Scan</a><a style="color:white;text-decoration:none;margin-left:10px" href="daftar.php">Daftar</a><a style="color:white;text-decoration:none;margin-left:10px" href="tambah.php">Tambah</a></div>
</nav>
<div class="container"><div class="card">
<h2>📦 Daftar Barang Komputer</h2>
<table class="tabel"><tr><th>Barcode</th><th>Nama</th><th>Rak</th><th>Stok</th><th>Status</th></tr>
<?php
$q=mysqli_query($conn,"SELECT p.*,r.nama_rak FROM produk p JOIN rak r ON p.rak_id=r.id ORDER BY p.id DESC");
while($r=mysqli_fetch_assoc($q)){
  $s=$r['stok']<=$r['stok_minimum']?'<span class="badge badge-tipis">Tipis</span>':'<span class="badge badge-aman">Aman</span>';
  echo "<tr><td>{$r['barcode']}</td><td>{$r['nama_barang']}</td><td>{$r['nama_rak']}</td><td>{$r['stok']}</td><td>$s</td></tr>";
}
?>
</table></div></div></body></html>