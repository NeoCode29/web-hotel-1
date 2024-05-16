
<?php
    // echo var_dump($_POST)
    include "../utils/db_conection.php";

    function reformatRupiah($rupiah){
        $row = str_replace([" ",".",",","Rp"],"",$rupiah);
        $real =  substr($row,2,-2);
        return ($real);
    }

    $nama_pemesan = $_POST["nama-pemesan"];
    $nomer_identitas = $_POST["nomer-identitas"];
    $tanggal_pemesanan = $_POST["tanggal-pemesanan"];
    $durasi_menginap = $_POST["durasi-menginap"];
    $gender = $_POST["gender"];
    $tipe_kamar = $_POST["tipe-kamar"];
    $harga_kamar = reformatRupiah($_POST["harga-kamar"]);
    $breakfast = isset($_POST["breakfast"]) ? 1 : 0;
    $harga_breakfast = isset($_POST["breakfast"]) ? 800000 : 0;
    $is_diskon = ((int)$_POST["durasi-menginap"]) > 3 ? 1 : 0;
    $total_harga_kamar = reformatRupiah($_POST["total-harga-kamar"]);
    $total_harga_breakfast = reformatRupiah($_POST["total-harga-breakfast"]);
    $total_harga_diskon = reformatRupiah($_POST["total-harga-diskon"]);
    $total_tagihan = reformatRupiah($_POST["total-tagihan"]);
    // (\"$nama_pemesan\", \"$nomer_identitas\", \"$tanggal_pemesanan\", $durasi_menginap, \"$gender\", \"$tipe_kamar\", $harga_kamar , $breakfast , $harga_breakfast, $is_diskon, $total_harga_kamar, $total_harga_breakfast,$total_harga_diskon,$total_tagihan);
    // var_dump($_POST);
    $query = "INSERT INTO tb_pemesanan (nama_pemesan ,nomer_identitas ,tanggal_pemesanan , durasi_menginap , gender , tipe_kamar , harga_kamar , breakfast , harga_breakfast , is_diskon , total_harga_kamar , total_harga_breakfast , total_harga_diskon , total_tagihan ) VALUES (\"$nama_pemesan\", \"$nomer_identitas\", \"$tanggal_pemesanan\" , $durasi_menginap , \"$gender\" , \"$tipe_kamar\" , $harga_kamar , $breakfast , $harga_breakfast , $is_diskon , $total_harga_kamar , $total_harga_breakfast , $total_harga_diskon , $total_tagihan );";
    mysqli_query( $conn, $query );
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Hotel</title>
    <?php include "../layout/bootsrap-link.php"?>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "../layout/header.php"?>
<main>
    <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
        <strong>Pemesanan Berhasil</strong> check bellow your information
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<div class="mt-3 card p-20 m-4">
    <h5 class="ps-2 mb-2 fs-1">Nota Pemesanan</h5>
    <div class="container-fluid grid-order">
        <div class="card">
            <table class="table ">
                <tbody>
                    <tr>
                        <td class="col-3">Nama Pemesan</td>
                            <td class="">:</td>
                            <td><?php echo $nama_pemesan ?></td>
                        </tr>
                        <tr>
                            <td>Nomer Identitas</td>
                            <td>:</td>
                            <td><?php echo $nomer_identitas?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td>:</td>
                            <td><?php echo $tanggal_pemesanan?></td>
                        </tr>
                        <tr>
                            <td>Durasi Menginap</td>
                            <td>:</td>
                            <td><?php echo $durasi_menginap . " hari"?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $gender?></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td>:</td>
                            <td><?php echo "kamar " . $tipe_kamar ?></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar / hari</td>
                            <td>:</td>
                            <td><?php echo $_POST["harga-kamar"] ?></td>
                        </tr>
                        <tr>
                            <td>Harga Breakfast / hari </td>
                            <td>:</td>
                            <td><?php echo isset($_POST["breakfast"]) ? "Rp 80.000,00" : "Rp 0,00" ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga Kamar</td>
                            <td>:</td>
                            <td><?php echo $_POST["total-harga-kamar"] . " ( Harga Kamar * durasi )" ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga Breakfast</td>
                            <td>:</td>
                            <td><?php echo $_POST["total-harga-breakfast"] . " ( Harga Breakfast * durasi )" ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga Diskon</td>
                            <td>:</td>
                            <td><?php echo $_POST["total-harga-diskon"] . " ( Harga Kamar * " . ($is_diskon ? "10% )" : "0% )") ?></td>
                        </tr>
                        <tr>
                            <td>Total Tagihan</td>
                            <td>:</td>
                            <td><?php echo $_POST["total-tagihan"] . " ( Total Harga Kamar + Total Harga Breakfast - Total Harga Diskon)" ?></td>
                        </tr>
                        
                        <tr class="text-center">
                            <td colspan="3">
                                <p class="fs-3">Ingin Memesan Lagi ?</p>
                                <div>
                                    <a href="http://localhost/web-hotel/order"><button type="button" class="btn btn-primary">Iya</button></a>
                                    <a href="http://localhost/web-hotel/"><button type="button" class="btn btn-danger">Tidak</button></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
            </table>
        </div>
    
        <div class="card p-20">
            <div class="card text-dark bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kamar Family</h5>
                    <div class="text-center ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/y_ncS5IVWgA" title="Paket Tour Ke Bali 4 Hari 3 Malam BTH 507 Cuma 1,9 Jutaan!!! Wow Murah Banget" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="card text-dark bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kamar Deluxe</h5>
                    <div class="text-center ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/y_ncS5IVWgA" title="Paket Tour Ke Bali 4 Hari 3 Malam BTH 507 Cuma 1,9 Jutaan!!! Wow Murah Banget" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="card text-dark bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kamar Standart</h5>
                    <div class="text-center ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/y_ncS5IVWgA" title="Paket Tour Ke Bali 4 Hari 3 Malam BTH 507 Cuma 1,9 Jutaan!!! Wow Murah Banget" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
                </div>
                </div>
            </div>

        </div>

    </div>

</main>
<?php include "../layout/footer.php"?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../utils/formOrderHandle.js"></script>
</body>
</html>