<?php 
include 'php/koneksi.php';
$data = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pendaftar WHERE id = $id";
    $query = mysqli_query($koneksi, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
    } else {
        die("Data tidak ditemukan...");
    }
} else {
    die("Akses dilarang...");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran</title>
    <link rel="stylesheet" href="css/styledetail.css">
</head>
<body>
    <div class="container">
        <div class="detail-card">
            <div class="page-title">
                <h1>Detail Pendaftaran</h1>
                <a href="index.php" class="back">&larr; Kembali ke Dashboard</a>
            </div>
            <div class="kv">
                <div class="key">Nama</div><div class="val"><?php echo htmlspecialchars($data['nama']); ?></div>
                <div class="key">Email</div><div class="val"><?php echo htmlspecialchars($data['email']); ?></div>
                <div class="key">Paket Bimbel</div><div class="val"><?php echo htmlspecialchars($data['paket']); ?></div>
                <div class="key">Lokasi Belajar</div><div class="val"><?php echo htmlspecialchars($data['lokasi']); ?></div>
                <div class="key">Fasilitas Tambahan</div><div class="val"><?php echo htmlspecialchars($data['fasilitas']); ?></div>
                <div class="key">Pajak</div><div class="val"><?php echo htmlspecialchars($data['tax']); ?>%</div>
                <div class="key">Catatan</div><div class="val"><?php echo htmlspecialchars($data['catatan']); ?></div>
                <div class="key">Metode Pembayaran</div><div class="val"><?php echo htmlspecialchars($data['metode_pembayaran']); ?></div>
            </div>
            <div class="breakdown">
                <h3>Rincian Biaya</h3>
                <div class="line"><span>Paket</span><span> Rp.<?php echo htmlspecialchars($data['price1']); ?></span></div>
                <div class="line"><span>Lokasi Belajar</span><span> Rp.<?php echo htmlspecialchars($data['price2']); ?></span></div>
                <div class="line"><span>Fasilitas Tambahan</span><span> Rp.<?php echo htmlspecialchars($data['price3']); ?></span></div>
                <div class="line"><span>Pajak</span><span> Rp.<?php echo htmlspecialchars($data['taxes']); ?></span></div>
                <div class="line"><span>Biaya Layanan</span><span> Rp.<?php echo htmlspecialchars($data['price4']); ?></span></div>
                <div class="line total"><span>Total</span><span> Rp.<?php echo htmlspecialchars($data['total_biaya']); ?></span></div>
            </div>
        </div>
    </div>
</body>
</html>