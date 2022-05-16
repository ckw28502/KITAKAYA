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
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>