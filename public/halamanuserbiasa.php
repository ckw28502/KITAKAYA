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
        <title>Halaman User Biasa</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #btnkeluar{
                margin-left: 45px;
            }
            #atur{
                margin-left: -10%;
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
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                Video
                            </a>
                            <a class="nav-link" href="../public/halamanuserbiasaforum.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                                Forum
                            </a>
                            <a class="nav-link" href="../public/halamanuserbiasasub.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                Upgrade To VIP Member
                            </a>
                            <a class="nav-link" href="../public/halamanhistorytransmember.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                History Transaksi 
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            <a class="nav-link" href="../public/halamanuserbiasacs.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-headphones"></i></div>
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
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Saham</li>
                        </ol>
                        <?php 
                            $video = Video::getVideo();
                            
                        ?>
                        <!-- <table class="table table-dark table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </thead>
                            <tbody> -->
                            <div class="container px-4">
                                <div class="row gx-5 row row-cols-3">
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

                                        
                                        $th = Video::getVideobyKategoriLast($video->id);
                                        
                                        ?>
                                            <!-- <div class="container">
                                                <div class="row row-cols-1">
                                                    <div class="col"><?= $video->nama_kategori ?></div>
                                                    <div class="col"><progress id="pb" value="<?=$min?>" max="<?=$max?>"></progress></div>
                                                    <div class="col"><a href="../controllers/vid.php?idvidBIASA=true&id=<?=$video->nama_kategori?>&idkategori=<?=$video->id?>">Detail</a></div>
                                                </div>
                                            </div> -->
                                            
                                            
                                            <div class="col">
                                                <div class="p-5 border bg-light">
                                                    <div class="row row-cols-2">
                                                        <div id="atur">
                                                            <div><?= $video->nama_kategori ?></div>
                                                            <progress id="pb" value="<?=$min?>" max="<?=$max?>"></progress>
                                                            <div><a href="../controllers/vid.php?idvidBIASA=true&id=<?=$video->nama_kategori?>&idkategori=<?=$video->id?>">Detail</a></div>
                                                        </div>
                                                       
                                                        <?php 
                                                        if ($max > 0) {
                                                            ?><div><img src="http://img.youtube.com/vi/<?=$th->video?>/maxresdefault.jpg" alt="Flowers" style="width:180px; margin-left: 15px; "></div><?php
                                                        } 
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            
                                        <?php
                                    }
                                ?>
                                </div>
                            </div>
                            <!-- </tbody>
                        </table> -->
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
            Message::print("Success");
            Message::print("VIP Membership Expired");
            Message::print("Gagal");
        ?>
    </body>
</html>
