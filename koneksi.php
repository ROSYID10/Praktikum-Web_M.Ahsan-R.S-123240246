<?php 

    $server = "localhost"; //127.0.0.1
    $user = "root";
    $password = "";
    $database = "punya_ahsan"; //sesuai nama database masing-masing

    $koneksi = mysqli_connect($server, $user, $password, $database);

    if (!$koneksi){
        die("Koneksi gagal : " .mysqli_connect_error());
    }
    
    
?>