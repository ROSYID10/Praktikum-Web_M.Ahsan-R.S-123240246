<?php 

include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM pendaftar WHERE id = $id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) < 1){
    die("Data Tidak Ditemukan..");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >EDIT DATA PENDAFTAR</title>
    <link rel="stylesheet" href="styletambah.css">
</head>
<body>
    <h1 align="center">EDIT DATA PENDAFTAR</h1>

    <br>
    <form action="php/prosesedit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama : </label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        <br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
        <br><br>

        <label>Paket Bimbingan</label><br>
        
        <input type="radio" name="paket" value="Intensif SBMPTN|500000" <?php if($data['paket']=="Intensif SBMPTN") echo 'checked'; ?>> Paket Intensif SBMPTN
        <input type="radio" name="paket" value="Reguler|750000" <?php if($data['paket']=="Reguler") echo 'checked'; ?>> Paket Reguler
        <input type="radio" name="paket" value="SuperCamp SBMPTN|1000000" <?php if($data['paket']=="SuperCamp SBMPTN") echo 'checked'; ?>> Paket Supercamp SBMPTN
        <br><br>

        <label>Fasilitas</label><br>
        <?php $fasilitas_lama = array_map('trim', explode(',', $data['fasilitas'])); ?>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Modul Cetak Lengkap|50000" <?php if(in_array('Modul Cetak Lengkap', $fasilitas_lama)) echo 'checked'; ?>> Modul Cetak Lengkap<br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Modul PDF|25000" <?php if(in_array('Modul PDF', $fasilitas_lama)) echo 'checked'; ?>> Modul PDF<br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Video Rekaman Kelas|75000" <?php if(in_array('Video Rekaman Kelas', $fasilitas_lama)) echo 'checked'; ?>> Video Rekaman Kelas<br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Grup Diskusi Telegram|40000" <?php if(in_array('Grup Diskusi Telegram', $fasilitas_lama)) echo 'checked'; ?>> Grup Diskusi Telegram<br>
        </label>

        <label for="Lokasi">Lokasi Cabang:</label>
        <select name="lokasi" id="lokasi">
            <option value="" disabled>-- Pilih Lokasi --</option>
            <option value="Jakarta Pusat|100000" <?php if($data['lokasi']=="Jakarta Pusat") echo 'selected'; ?>>Jakarta Pusat</option>
            <option value="Yogyakarta|80000" <?php if($data['lokasi']=="Yogyakarta") echo 'selected'; ?>>Yogyakarta</option>
            <option value="Surabaya|150000" <?php if($data['lokasi']=="Surabaya") echo 'selected'; ?>>Surabaya</option>
            <option value="Makassar|115000" <?php if($data['lokasi']=="Makassar") echo 'selected'; ?>>Makassar</option>
            <option value="Aceh|120000" <?php if($data['lokasi']=="Aceh") echo 'selected'; ?>>Aceh</option>
        </select>
        <br><br>

        <label for="Metode">Metode Pembayaran:</label>
        <select name="Metode" id="Metode">
            <option value="" disabled>-- Pilih Metode --</option>
            <option value="Transfer Bank|3000" <?php if($data['metode_pembayaran']=="Transfer Bank") echo 'selected'; ?>>Transfer Bank +3000</option>
            <option value="Tunai|0" <?php if($data['metode_pembayaran']=="Tunai") echo 'selected'; ?>>Tunai</option>
            <option value="E-Wallet|2000" <?php if($data['metode_pembayaran']=="E-Wallet") echo 'selected'; ?>>E-Wallet +2000</option>
        </select>
        <br><br>

        <label for="catatan">Note :</label><br>
        <textarea id="catatan" name="catatan" rows="4" cols="50" placeholder="Masukkan catatan tambahan..."><?php echo htmlspecialchars($data['catatan']); ?></textarea><br>

        <button type="reset">Reset</button>
        <button type="submit" name="submit">Update</button><br>
        <a href="index.php"><button type="button">Kembali</button></a>
    </form>
</body>
</html>

