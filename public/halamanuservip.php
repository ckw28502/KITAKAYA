<?php
    require_once "../config/config.php";
    use Utils\Message;
    use Models\Video;

    // untuk nampilkan nama
    $user = $_SESSION["user"];
    $munculkan = $user->nama;

    
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman User VIP</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #btnkeluar{
                margin-left: 45px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="halamanuservip.php">KITAKAYA</a>
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
                        <li><a href="../controllers/auth.php?logoutcusvip"><button class="btn btn-danger" id="btnkeluar">Logout</button></a></li>
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
                            <a class="nav-link" href="../public/halamanuservip.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Video
                            </a>
                            <a class="nav-link" href="../public/halamanuserviprekomendasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Rekomendasi Saham
                            </a>
                            <a class="nav-link" href="../public/halamanuservipforum.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Forum
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            <a class="nav-link" href="../public/halamanuservipcs.php">
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
                        <h1 class="mt-4">Kumpulan Video</h1>
                        <?php 
                            $video = Video::getVideo();
                        ?>
                        <table class="table table-dark table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $user = $_SESSION["user"];
                                    $userid = $user->id;
                                    // $kategori = $_SESSION['namakategori'];
                                    // $idkategori = Video::getKategoribyName($kategori);
                                    // $idkategori = $idkategori->id;
                                    
                                    foreach($video as $idx => $video){
                                        $max = Video::jumlahVideo($video->id);
                                        $max = $max->c;

                                        $min = Video::VideoWatchedPB($userid, $video->id);
                                        $min = $min->c;
                                        ?>
                                        <tr>
                                            <td><?= $idx + 1 ?></td>
                                            <td><?= $video->nama_kategori ?></td>
                                            <td><progress id="pb" value="<?=$min?>" max="<?=$max?>"></progress></td>
                                            <td>
                                                <a href="../controllers/vid.php?idvidVIP=true&id=<?=$video->nama_kategori?>">Detail</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
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
        <?php
            Message::print("VIP");
        ?>
    </body>
</html>
