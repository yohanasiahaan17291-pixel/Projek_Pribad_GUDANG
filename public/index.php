<?php include '../config/db.php'; include '../views/components/header.php'; include '../views/components/navbar.php'; ?>
<div class="container">
  <div class="card">
    <h2>📷 Scan Barcode Masuk</h2>
    <div id="reader"></div>
    <div id="hasil-scan" style="margin-top:10px"></div>
  </div>
  <div class="card">
    <h3>📦 Stok Terbaru</h3>
    <?php
    $q=mysqli_query($conn,"SELECT p.*, r.nama_rak FROM produk p JOIN rak r ON p.rak_id=r.id ORDER BY p.id DESC");
    while($r=mysqli_fetch_assoc($q)){
      $cls = $r['stok'] <= $r['stok_minimum'] ? 'badge-tipis' : 'badge-aman';
      echo "<div style='display:flex;justify-content:space-between;padding:10px;border-bottom:1px solid #eee'><span>{$r['nama_barang']} <small>({$r['nama_rak']})</small></span><span class='badge $cls'>{$r['stok']} pcs</span></div>";
    }
    ?>
  </div>
</div>
<?php include '../views/components/footer.php'; ?>