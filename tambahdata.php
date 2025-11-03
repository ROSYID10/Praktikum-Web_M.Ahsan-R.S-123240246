<!DOCTYPE html>
<html>
<head>
    <title>BIMBEM BABARSARI</title>
    <link rel="stylesheet" href="styletambah.css">
</head>
<body>

    <h1 align="center">BIMBEL BABARSARI</h1>


    <form action="prosestambahdata.php" method="POST">
        <label>Nama : </label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required>
        <br><br>

        <label>Paket Bimbingan</label>
        <br>
        <input type="radio" name="paket" value="Intensif SBMPTN|500000" required> Paket Intensif SBMPTN
        <br>
        <input type="radio" name="paket" value="Reguler|750000" required> Paket Reguler
        <br>
        <input type="radio" name="paket" value="SuperCamp SBMPTN|1000000" required> Paket Supercamp SBMPTN
        <br>
        <br><br>
        
        <label>Fasilitas</label><br>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Modul Cetak Lengkap|50000"> Modul Cetak Lengkap
        <br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Modul PDF|25000"> Modul PDF
        <br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Video Rekaman Kelas|75000"> Video Rekaman Kelas
        <br>
        </label>
        <label>
        <input type="checkbox" name="fasilitas[]" value="Grup Diskusi Telegram|40000"> Grup Diskusi Telegram
        <br>
        </label>

        <label for="Lokasi">Lokasi Cabang:</label>
                <select name="lokasi" id="lokasi">
                    <option value="" selected disabled>-- Pilih Lokasi --</option>
                    <option value="Jakarta Pusat|100000"> Jakarta Pusat </option>
                    <option value="Yogyakarta|80000">Yogyakarta </option>
                    <option value="Surabaya|150000"> Surabaya </option>
                    <option value="Makassar|115000"> Makassar </option>
                    <option value="Aceh|120000"> Aceh </option>
                </select>
                <br><br>

        <label for="Metode">Metode Pembayaran:</label>
                <select name="Metode" id="Metode">
                    <option value="" selected disabled>-- Pilih Metode --</option>
                    <option value="Transfer Bank|3000">Transfer Bank +3000</option>
                    <option value="Tunai|0">Tunai</option>
                    <option value="E-Wallet|2000">E-Wallet +2000</option>
                </select>
        <br><br>
        <label for="catatan">Note :</label><br>
        <textarea id="catatan" name="catatan" rows="4" cols="50" placeholder="Masukkan catatan tambahan..."></textarea><br>

        <button type="reset">Reset</button>
        <button type="submit" name="submit">Tambah</button><br>
        <button action="index.php">KEMBALI KE DASHBOARD</button>
        
    </form>

</body>
</html>