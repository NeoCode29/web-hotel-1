<?php
    include "databaseConnection.php";

    $nama = $_POST["nama-pemesan"];
    $paket = (int)$_POST["nama-paket"];
    $tgl_pesan = $_POST["tgl-pesan"];
    $durasi = (int)$_POST["durasi"];
    $jumlah_peserta = (int)$_POST["jumlah-peserta"];
    $layanan_penginapan = isset($_POST["penginapan"]) ? 1 : 0;
    $layanan_transportasi = isset($_POST["transportasi"]) ? 1 : 0;
    $layanan_makanan = isset($_POST["makanan"]) ? 1: 0;
    $harga_paket = (int)$_POST["harga-paket"];
    $harga_layanan = (int)$_POST["harga-layanan"];
    $jumlah_tagihan = (int)$_POST["jumlah-tagihan"];

    $query = "INSERT INTO pemesanan ( nama_pemesan , paket , tanggal_pemesanan , durasi_perjalanan , jumlah_peserta , layanan_1 , layanan_2, layanan_3, harga_paket, harga_layanan , total_harga ) VALUES ( \"$nama\", $paket, \"$tgl_pesan\", $durasi ,$jumlah_peserta, $layanan_penginapan ,$layanan_transportasi, $layanan_makanan ,$harga_paket ,$harga_layanan ,$jumlah_tagihan)";

    mysqli_query($DBconn,$query );

?>