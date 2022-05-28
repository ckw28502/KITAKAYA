<?php
    require_once "../config/config.php";

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
        <title>Halaman User VIPS</title>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                Video
                            </a>
                            <a class="nav-link" href="../public/halamanuserviprekomendasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Rekomendasi Saham
                            </a>
                            <a class="nav-link" href="../public/halamanuservipforum.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                                Forum
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            <a class="nav-link" href="../public/halamanuservipcs.php">
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
                        <h1 class="mt-4">Rekomendasi Saham</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Saham</li>
                        </ol>
                        <div class="card mb-4" style="height : 500px;">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div id="watchlist-chart-demo"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            </div>
                            <!-- TradingView Widget END -->
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
        <script src="../utils/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(new function(){
                cekupdate=()=>{
                    let temp=-1;
                    //get max id
                    $.ajax({
                        method:"get",
                        url:"../controllers/chart.php",
                        data:{
                            action:"getmax"
                        }
                    }).done((data)=>{
                        temp=JSON.parse(data,true);
                        //Kalau max id > id sekarang, data diupdate
                        if (temp>id) {
                            id=temp;
                            $.ajax({
                                method:"get",
                                url:"../controllers/chart.php",
                                data:{
                                    action:"getall"
                                }
                            }).done((d)=>{
                                arr=JSON.parse(d,true);
                                new TradingView.widget(
                                    {
                                    "container_id": "watchlist-chart-demo",
                                    "width": "100%",
                                    "height": "100%",
                                    "autosize": true,
                                    "symbol": "NASDAQ:"+arr[arr.length-1],
                                    "interval": "D",
                                    "timezone": "exchange",
                                    "theme": "light",
                                    "style": "1",
                                    "toolbar_bg": "#f1f3f6",
                                    "withdateranges": true,
                                    "allow_symbol_change": true,
                                    "save_image": false,
                                    "watchlist": arr,
                                    "locale": "en"
                                    }
                                );
                            });
                        }
                    });
                };
                var id=-1;
                //Untuk cek update per detik
                if (id<0) {
                    setInterval(cekupdate,1000);
                };
            });
        </script>
    </body>
</html>
