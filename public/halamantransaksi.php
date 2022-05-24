<?php
    use Utils\Message;

    require_once "../config/config.php";

    $bisa = $_GET["harga"];
    $bulan = $_GET["bulan"];
    $ambilnama = $_GET["namacus"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi (Done)</title>
    <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            /* min-height: 100vh; */
            /* height: 100vh; */
            background-color: #0C4160;
            padding: 30px 10px;
        }

        .card {
            margin-top: 1%;
            color: black;
        }

        p {
            margin: 0px;
        }

        .container .h8 {
            font-size: 30px;
            font-weight: 800;
            text-align: center;
        }

        .btn.btn-primary {
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
            border: none;
            transition: 0.5s;
            background-size: 200% auto;

        }
        .btn.btn.btn-primary:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }

        .form-control {
            color: white;
            background-color: #223C60;
            border: 2px solid transparent;
            height: 60px;
            padding-left: 20px;
            vertical-align: middle;
        }

        .form-control:focus {
            color: white;
            background-color: #0C4160;
            border: 2px solid #2d4dda;
            box-shadow: none;
        }

        .text {
            font-size: 14px;
            font-weight: 600;
        }

        #gaekata{
            float: right;
            font-size: large;
            padding-top: 50px;
            margin-right: 68%;
        }
        #untukharga{
            text-align: center;
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
            <div class="container p-0">
                <div class="card px-4">
                    <!-- <p id="gaekata">KITAKAYA</p> -->
                    <!-- <div>
                        <img src="../assets/img/Logo_New.png" width="130" height="150"/>
                        <p id="gaekata">KITAKAYA</p>
                    </div> -->
                    <p class="h8 py-3">Payment Details</p>
                    <h2 style="text-align: center;">IDR <?= $bisa?></h2>
                    <div >
                        <h4>Metode Pembayaran</h4>
                        <br>
                        <div>
                            <!-- <img src="../assets/img/bank.png" height="70" width="70">
                            <h3 style="float: right; padding-top: 41px; margin-right: 82%;">Bank Transfer</h3> -->

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
                        <div>
                            <!-- <h3 style="float: right; padding-top: 41px; margin-right: 82%;">E-wallet</h3> -->

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
                        <form action="../controllers/transaksi.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Nama Customer</label>
                                    <input type="text" class="form-control" value="<?= $ambilnama?>" name="namacus">
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti Transfer</label>
                                    <input type="file" class="form-control" name="fotobukti" style="padding-top: 3%;">
                                </div>
                                <br>
                                <input type="text" class="form-control" value="<?= $bisa?>" name="harga" hidden>
                                <input type="text" class="form-control" value="<?= $bulan?>" name="bulan" hidden>

                                <!-- <div class="d-grid gap-2 col-12 mx-auto">
                                    <button class="btn btn-primary" name="btnTambah">Kirim</button>
                                </div> -->
                                <div class="col-12">
                                    <div class="btn btn-primary mb-3">
                                        <button class="btn btn-primary" name="btnTambah">Pay <?= $bisa?></button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div >
                                        <button class="btn btn-danger" name="balikae">Back</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                
            
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>