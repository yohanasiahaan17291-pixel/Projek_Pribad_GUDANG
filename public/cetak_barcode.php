<?php include '../config/db.php'; include '../views/components/header.php'; include '../views/components/navbar.php'; ?>
<div class="container"><div class="card">
<h2>🖨️ Cetak Barcode Komputer</h2>
<button class="btn btn-blue" onclick="window.print()">Cetak Sekarang</button>
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:15px">
<?php $q=mysqli_query($conn,"SELECT * FROM produk"); while($r=mysqli_fetch_assoc($q)){ ?>
<div style="border:1px dashed #000;padding:10px;text-align:center;background:white">
<b><?= $r['nama_barang']?></b><br>
<svg class="barcode" jsbarcode-value="<?= $r['barcode']?>"></svg><br>
<?= $r['barcode']?>
</div>
<?php } ?>
</div></div></div>
<script>JsBarcode(".barcode").init();</script>
<?php include '../views/components/footer.php'; ?>