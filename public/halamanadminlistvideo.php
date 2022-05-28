<?php
    use Utils\Message;
    use Models\Video;
    require_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
        <link href="../assets/css/addvideo.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="halamanadmin.php">KITAKAYA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <h3 style="color: white;">Welcome, Admin</h3>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <!-- <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="../index.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Admin</div>
                            <a class="nav-link" href="../public/halamanadmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-play-circle"></i></div>
                                Add Video
                            </a>
                            <a class="nav-link" href="../public/halamanadminlistvideo.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                List Video
                            </a>
                            <a class="nav-link" href="../public/halamanaddchart.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Add Chart
                            </a>
                            <a class="nav-link" href="../public/halamanadminlistchart.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                List Chart
                            </a>
                            <a class="nav-link" href="../public/halamanadminvalidasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Validasi Pembayaran Member
                            </a>
                            <a class="nav-link" href="../public/halamanhistorytrans.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                History Transaksi
                            </a>
                            <div class="sb-sidenav-menu-heading">Charts</div>
                            <a class="nav-link collapsed" href="../public/halamanchartumur.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Chart Umur
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                            <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->
                            <a class="nav-link collapsed" href="../public/halamanchartperkembangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Chart Perkembangan Member
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Semua Video</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Saham</li>
                        </ol>     
                        <?php 
                            $video = Video::getVideo();
                        ?>
                        <table class="table table-dark table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($video as $idx => $video){
                                        ?>
                                        <tr>
                                            <td><?= $idx + 1 ?></td>
                                            <td><?= $video->nama_kategori ?></td>
                                            <td>
                                                <a href="../controllers/vid.php?idvid=true&id=<?=$video->nama_kategori?>">Detail</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
                <?php 
                    Message::print("error");
                    Message::print("success");
                ?>
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