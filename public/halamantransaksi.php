<?php
    require_once "../config/config.php";

    $bisa = $_GET["harga"];

    $ambilnama = $_GET["namacus"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi</title>
    <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #gaekata{
            float: right;
            font-size: xx-large;
            padding-top: 40px;
            margin-right: 82%;
        }
        #untukharga{
            text-align: center;
        }
        #format{
            margin-left: 45px;
        }

        /* HIDE RADIO */
        [type=radio] { 
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            outline: 2px solid black;
        }
    </style>
</head>
<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-6">
                <img src="../assets/img/Logo_New.png" width="130" height="150"/>
                <p id="gaekata">KITAKAYA</p>
                <!-- <h1 class="mt-3">KITAKAYA</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Saham</li>
                </ol> -->
                <div id="untukharga">
                    <h1>IDR <?= $bisa?></h1>
                </div>
                <br>
                <h4 style="margin-left: 45px;">Metode Pembayaran</h4>
                <br>
                <div id="format">
                    <img src="../assets/img/bank.png" height="70" width="70">
                    <h3 style="float: right; padding-top: 41px; margin-right: 82%;">Bank Transfer</h3>

                    <label>
                        <input type="radio" name="metode" value="bca" >
                        <img src="../assets/img/bca.jpg" height="100" width="150">
                    </label>

                    <label>
                        <input type="radio" name="metode" value="bri">
                        <img src="../assets/img/bri.jpg" height="100" width="150" style="margin-left: 20px;">
                    </label>

                    <label>
                        <input type="radio" name="metode" value="mandiri">
                        <img src="../assets/img/mandiri.jpg" height="100" width="150" style="margin-left: 20px;">
                    </label>
                </div>
                <br>
                <div id="format">
                    <img src="../assets/img/ewallet.png" height="70" width="70">
                    <h3 style="float: right; padding-top: 41px; margin-right: 87%;">E-wallet</h3>

                    <label>
                        <input type="radio" name="metode" value="ovo">
                        <img src="../assets/img/ovo.jpg" height="100" width="150">
                    </label>

                    <label>
                        <input type="radio" name="metode" value="gopay">
                        <img src="../assets/img/gopay.png" height="100" width="150" style="margin-left: 20px;">
                    </label>

                    <label>
                        <input type="radio" name="metode" value="dana">
                        <img src="../assets/img/dana.png" height="100" width="150" style="margin-left: 20px;">
                    </label>
                </div>
                <br>
                <div id="format">
                    <form action="../controllers/transaksi.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Nama Customer</label>
                                <input type="text" class="form-control" value="<?= $ambilnama?>" name="namacus">
                            </div>
                            <div class="form-group">
                                <label for="">Bukti Transfer</label>
                                <input type="file" class="form-control" name="fotobukti">
                            </div>
                            <br>
                            <input type="text" class="form-control" value="<?= $bisa?>" name="harga" hidden>
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button class="btn btn-primary" name="btnTambah">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>