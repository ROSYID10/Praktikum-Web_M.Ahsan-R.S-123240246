<?php 
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PENDAFTARAN BIMBEL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>DATA PENDAFTARAN BIMBEL</h1>
    <div class="tambah-data-wrapper">
        <a href="tambahdata.php" class="tambah-data-btn">Tambah Data</a>
    </div>
    <table align="center">
         <tr>
            <th>No</th>
            <th>Nama Pendaftar</th>
            <th>Paket</th>
            <th>Total Biaya</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        $sql = "SELECT * FROM pendaftar";
        $query = mysqli_query($koneksi, $sql);

        if ($query && mysqli_num_rows($query) > 0) {
            while($data = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['nama']?></td>
            <td><?php echo $data['paket']?></td>
            <td>Rp.<?php echo $data['total_biaya']?></td>

            <td>
                <a href="detail.php?id=<?php echo $data['id']; ?>">detail</a>
                <a href="editdata.php?id=<?php echo $data['id']; ?>">Edit</a>
                <a href="php/hapus.php?id=<?php echo $data['id']; ?>">hapus</a>
            </td>
        </tr>
        <?php }
        } else {
            // Tampilkan pesan bila tidak ada data
            echo '<tr><td colspan="5" style="text-align:center;padding:8px">Belum ada data</td></tr>';
        }
        ?>
    </table>
</body>
</html> 