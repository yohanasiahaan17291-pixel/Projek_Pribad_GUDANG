<?php
include __DIR__ . '/../config/db.php';
header('Content-Type: application/json');
$raw = file_get_contents("php://input");
$input = json_decode($raw, true);
$barcode = mysqli_real_escape_string($conn, $input['barcode'] ?? '');

if($barcode==''){ echo json_encode(['status'=>'error','message'=>'Barcode kosong']); exit; }

$q = mysqli_query($conn, "SELECT * FROM produk WHERE barcode='$barcode'");
if (!$q || mysqli_num_rows($q)==0){
  echo json_encode(['status'=>'error','message'=>'Barang '.$barcode.' tidak ditemukan']);
  exit;
}
$p = mysqli_fetch_assoc($q);
mysqli_query($conn, "UPDATE produk SET stok=stok+1 WHERE id=".$p['id']);
mysqli_query($conn, "INSERT INTO transaksi(produk_id, jenis, jumlah) VALUES(".$p['id'].",'masuk',1)");
echo json_encode(['status'=>'ok','message'=>$p['nama_barang'].' berhasil +1 pcs']);
?>