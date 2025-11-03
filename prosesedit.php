<?php 

include 'koneksi.php';

$Nama  = $_POST['nama'];
$email = $_POST['email'];

if (isset($_POST['paket'])) {
    list($nama_paket, $harga_paket) = explode('|', $_POST['paket']);
} else {
    $nama_paket = 'undefined';
    $harga_paket = 0;
}

if(isset($_POST['lokasi'])) {
    list($nama_lokasi, $harga_lokasi) = explode('|', $_POST['lokasi']);
} else {
    $nama_lokasi = 'undefined';
    $harga_lokasi = 0;
}

if (isset($_POST['fasilitas'])) {
    foreach ($_POST['fasilitas'] as $item) {
        list($nama, $harga) = explode('|', $item);
        $fasilitas_list[$nama] = $nama;
        $total_fasilitas += (int)$harga;
    }
    $fasilitas = implode(", ", $fasilitas_list);
} else {
    $fasilitas = '-';
    $total_fasilitas = 0;
}
$catatan= isset($_POST['catatan']) ? $_POST['catatan'] : '-';

if(isset($_POST['Metode'])) {
    list($nama_metode, $harga_metode) = explode('|', $_POST['Metode']);
} else {
    $nama_metode = 'undefined';
    $harga_metode = 0;
}

if(isset($_POST['paket'])){
    $pajak = "10%";
    $biaya_pajak = 0.10 * ($harga_paket + $harga_lokasi + $total_fasilitas);
} else {
    $biaya_pajak = 0;
}
$total_biaya        = $harga_paket + $harga_lokasi + $total_fasilitas + $biaya_pajak + $harga_metode;

//query
$sql = "UPDATE pendaftar SET 
    nama = '$Nama',
    email = '$email',
    paket = '$nama_paket',
    fasilitas = '$fasilitas',
    lokasi = '$nama_lokasi',
    metode_pembayaran = '$nama_metode',
    catatan = '$catatan',
    price1 = '$harga_paket',
    price2 = '$harga_lokasi',
    price3 = '$total_fasilitas',
    price4 = '$harga_metode',
    tax = '$pajak',
    taxes = '$biaya_pajak',
    total_biaya = '$total_biaya'
    WHERE id = {$_POST['id']}";
    //jalanin
    $query = mysqli_query($koneksi, $sql);
    
    //handling
    if ($query){
        header('Location: ../index.php?status=berhasil_login');
    }else{
        echo "gagal CUYY";
    }
    ?>