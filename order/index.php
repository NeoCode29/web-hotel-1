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

<div class="mt-3 card p-20 m-4">
    <h5 class="ps-2 mb-2 fs-1">Form Pemesanan</h5>
    <div class="container-fluid grid-order">
        <form action="order-nota.php" method="post" autocomplete="off" class="card p-20 grid-form-order">
            <div class="grid-form-order-form1">
                <div class="mb-3">
                        <label for="nama-pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control form-control-sm" id="nama-pemesan" name="nama-pemesan" placeholder="" required>
                </div>
                <div class="mb-3">
                        <label for="nomer-identitas" class="form-label">Nomer Identitas ( KTP )</label>
                        <input type="text" class="form-control form-control-sm" maxlength="16" minlength="16" id="nomer-identitas" name="nomer-identitas" placeholder="" onblur="handleLengthID(this)" oninvalid="handleInvalidID(this)" required>
                </div>
                <div class="mb-3">
                        <label for="tanggal-pemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control form-control-sm" id="tanggal-pemesanan" name="tanggal-pemesanan" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="durasi-menginap" class="form-label">Durasi menginap</label>
                    <div class="input-group input-group-sm">
                        <input type="number" class="form-control form-control-sm" id="durasi" name="durasi-menginap" aria-describedby="basic-addon2" onchange="handleDurasiMenginap(this)">
                        <span class="input-group-text" id="basic-addon2">hari</span>
                    </div>
                </div>
            </div>

            <div class="grid-form-order-form2 p-4">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-body">
                        <h5>Select Gender :</h5>
                        <input type="radio" id="pria" name="gender" value="pria">
                        <label for="pria">pria</label><br>
                        <input type="radio" id="wanita" name="gender" value="wanita">
                        <label for="wanita">wanita</label><br>
                    </div>
                </div>
                <div class="card text-dark bg-light mb-3">
                    <div class="card-body">
                        <label for="tipe-kamar" class="form-label">Tipe Kamar</label>
                        <select class="form-select" id="tipe-kamar" name="tipe-kamar" id="tipe-kamar" onChange="handleTipeKamar(this)" aria-label="Default select example" >
                            <option selected>Pilih Paket</option>
                            <option value="family"><strong>Kamar Family</strong> ( Rp. 1.000.000 / hari )</option>
                            <option value="deluxe"><strong>Kamar Deluxe</strong> ( Rp. 750.000 / hari )</option>
                            <option value="standart"><strong>Kamar Standart</strong> ( Rp. 500.000 / hari )</option>
                        </select>
                        
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="Y" id="breakfast" name="breakfast" onclick="handleBreakfast(this)">
                            <label class="form-check-label" for="penginapan">
                                <strong>include breakfast</strong> ( Rp 80.000 )
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-order-form-notif">
                <div class="alert alert-secondary" role="alert">
                    jika durasi menginap lebih dari 3 hari mendapatkan diskon 10%
                </div>
            </div>
            <div class="p-30 bg-gray rounded grid-form-order-validation">
                <div class="mb-4">
                    <label for="harga-kamar" class="form-label mt-2"><strong>Harga Kamar </strong> </label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="harga-kamar" name="harga-kamar" aria-label="harga-kamar" aria-describedby="basic-tagihan"  required onkeydown="return false;">
                    </div>
                    <hr>
                    <label for="total-harga-kamar" class="form-label mt-2"><strong>Total Harga Kamar </strong>( harga kamar x durasi menginap )</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="total-harga-kamar" name="total-harga-kamar" aria-label="total-harga-kamar" aria-describedby="basic-tagihan"  required onkeydown="return false;">
                    </div>
                    <label for="total-harga-breakfast" class="form-label mt-2"><strong>Total Harga Breakfast </strong>( harga breakfast x durasi menginap )</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="total-harga-breakfast" name="total-harga-breakfast" aria-label="total-harga-breakfast" aria-describedby="basic-tagihan" required onkeydown="return false;">
                    </div>
                    <label for="total-harga-diskon" class="form-label mt-2"><strong> Total Harga Diskon </strong>( Total Harga Kamar x <span id="diskon">0</span>% )</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="total-harga-diskon" name="total-harga-diskon" aria-label="total-harga-diskon" aria-describedby="basic-tagihan"  required onkeydown="return false;">
                    </div>
                    <hr>
                    <label for="total-tagihan" class="form-label mt-2"><strong>Total Tagihan </strong>( Total Harga Kamar + Total Harga Breakfast - Total Harga Diskon )</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="total-tagihan" name="total-tagihan" aria-label="total-tagihan" aria-describedby="basic-tagihan" required onkeydown="return false;">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-primary" onclick="handleHitungButton()">Hitung</button>
                    <button type="button" class="btn btn-danger" onclick="handleCancelButton()">Cancel</button>
                </div>



            </div>
        </form>
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
<?php include "../layout/footer.php"?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../utils/formOrderHandle.js"></script>
</body>
</html>