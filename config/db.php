<?php
$conn = mysqli_connect("localhost", "root", "", "gudang_barcode");
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>