<?php
    require_once "../config/config.php";

    // untuk nampilkan namaa
    $user = $_SESSION["user"];
    $munculkan = $user->nama;

    if (isset($_REQUEST["btnBeli1"])) {
        header("Location: ../public/halamantransaksi.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman User Biasa</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #btnkeluar{
                margin-left: 45px;
            }

            .card {
                border:none;
                padding: 10px 50px;
            }

            .card::after {
                position: absolute;
                z-index: -1;
                opacity: 0;
                -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
                transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }

            .card:hover {
                transform: scale(1.02, 1.02);
                -webkit-transform: scale(1.02, 1.02);
                backface-visibility: hidden; 
                will-change: transform;
                box-shadow: 0 1rem 3rem rgba(0,0,0,.75) !important;
            }

            .card:hover::after {
                opacity: 1;
            }

            .card:hover .btn-outline-primary{
                color:white;
                background:#007bff;
            }

            #biarterlihat{
                color: red;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="halamanuserbiasa.php">KITAKAYA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <h3 style="color: white;">Welcome, <?= $munculkan?></h3>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="../index.php">Logout</a></li> -->
                        <li><a href="../controllers/auth.php?logoutcusbiasa"><button class="btn btn-danger" id="btnkeluar">Logout</button></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu User</div>
                            <a class="nav-link" href="../public/halamanuserbiasa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Video
                            </a>
                            <a class="nav-link" href="../public/halamanuserbiasaforum.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Forum
                            </a>
                            <a class="nav-link" href="../public/halamanuserbiasasub.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Upgrade To VIP Member
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            <a class="nav-link" href="../public/halamanuserbiasacs.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Customer Service
                            </a>   
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Upgrade To VIP</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="container p-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card h-100 shadow-lg">
                                    <div class="card-body">
                                    <div class="text-center p-3">
                                        <h5 class="card-title">Paket Standart</h5>
                                        <small>Member VIP</small>
                                        <br><br>
                                        <span class="h3">Rp 120.000</span>
                                        <br><br>
                                    </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Rekomendasi Saham Pilihan</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Video Lengkap</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> 1 Bulan</li>
                                    <br>
                                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 1 Bulan di depan</p>
                                    </ul>
                                    <div class="card-body text-center">
                                    <form action="../controllers/auth.php" method="POST">
                                        <a href="../public/halamantransaksi.php?harga=120.000&namacus=<?=$munculkan?>" class="btn btn-outline-primary btn-lg" style="border-radius:30px" name="btnbeli">Beli</a>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card h-100 shadow-lg">
                                    <div class="card-body">
                                    <div class="text-center p-3">
                                        <h5 class="card-title">Paket Super</h5>
                                        <small>Member VIP</small>
                                        <br><br>
                                        <span class="h3">Rp 500.000</span> 
                                        <br><br>
                                    </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Rekomendasi Saham Pilihan</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Video Lengkap</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> 6 Bulan</li>
                                    <br>
                                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 6 Bulan di depan</p>
                                    </ul>
                                    <div class="card-body text-center">
                                    <form action="../controllers/auth.php" method="POST">
                                        <a href="../public/halamantransaksi.php?harga=500.000&namacus=<?=$munculkan?>" class="btn btn-outline-primary btn-lg" style="border-radius:30px">Beli</a>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card h-100 shadow-lg">
                                    <div class="card-body">
                                        <div class="text-center p-3">
                                            <h5 class="card-title">Paket Terbaik</h5>
                                            <small>Member VIP</small>
                                            <br><br>
                                            <span class="h3">Rp 1.100.000</span>
                                            <br><br>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Rekomendasi Saham Pilihan</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> Video Lengkap</li>
                                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> 12 Bulan</li>
                                    <br>
                                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 12 Bulan di depan</p>
                                    </ul>
                                    <div class="card-body text-center">
                                    <form action="../controllers/auth.php" method="POST">
                                        <a href="../public/halamantransaksi.php?harga=1.100.000&namacus=<?=$munculkan?>" class="btn btn-outline-primary btn-lg" style="border-radius:30px">Beli</a>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
