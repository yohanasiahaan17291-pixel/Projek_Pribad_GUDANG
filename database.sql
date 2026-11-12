SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS riwayat_stok, transaksi_log, transaksi, produk, rak;
CREATE TABLE rak (id INT PRIMARY KEY, nama_rak VARCHAR(20), lokasi VARCHAR(50));
CREATE TABLE produk (id INT AUTO_INCREMENT PRIMARY KEY, barcode VARCHAR(50) UNIQUE NOT NULL, nama_barang VARCHAR(100) NOT NULL, rak_id INT, stok INT DEFAULT 0, stok_minimum INT DEFAULT 2, FOREIGN KEY (rak_id) REFERENCES rak(id));
CREATE TABLE transaksi (id INT AUTO_INCREMENT PRIMARY KEY, produk_id INT, jenis ENUM('masuk','keluar') DEFAULT 'masuk', jumlah INT DEFAULT 1, tanggal DATETIME DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (produk_id) REFERENCES produk(id));
INSERT INTO rak VALUES (1, 'RAK-A', 'Aksesoris'),(2, 'RAK-B', 'Komponen PC'),(3, 'RAK-C', 'Laptop & Monitor');
INSERT INTO produk (barcode, nama_barang, rak_id, stok, stok_minimum) VALUES ('880123400001', 'Mouse Logitech M100', 1, 25, 5),('880123400002', 'Keyboard Rexus Daxa', 1, 15, 3),('880123400003', 'Headset Fantech HG20', 1, 10, 2),('880123400004', 'SSD Kingston 256GB', 2, 20, 5),('880123400005', 'RAM 8GB DDR4', 2, 18, 4),('880123400006', 'VGA GTX 1650', 2, 5, 1),('880123400007', 'Laptop ASUS VivoBook', 3, 3, 1),('880123400008', 'Monitor LG 24 Inch', 3, 6, 2);
SET FOREIGN_KEY_CHECKS=1;