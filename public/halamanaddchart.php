<?php
    require_once "../config/config.php";
    use Utils\Message;
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
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
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
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Add Video
                            </a>
                            <a class="nav-link" href="../public/halamanaddchart.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Add Chart
                            </a>
                            <a class="nav-link" href="../public/halamanadminvalidasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Validasi Pembayaran Member
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
                        <h1 class="mt-4">Add Chart</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Saham</li>
                        </ol>
                        <br>
                        <div class="card mb-4" style="height : 500px;">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div id="watchlist-chart-demo"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        <div style="height: 100vh">
                            <!-- Add Watchlist nama harus sesuai dengan di trading view kalo gak error-->
                            <h3>Add Watchlist</h3>
                            <div class="col-lg-6">
                                <label for="userName" class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="AAPL" id="nama" name="nama">
                            </div>
                            <div class="col-lg-6">
                                <label for="keterangan" class="form-label">Keterangan</label><br>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                            </div>
                            <br>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="addchart" onclick="addchart()">Add</button>
                            </div>
                        </div>
                        <div class="card mb-4"><div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div></div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../utils/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(new function(){
                addchart=()=>{
                    const nama=$("#nama").val();
                    const keterangan=$("#keterangan").val();
                    $("#nama").val("");
                    $("#keterangan").val("");
                    $.ajax({
                        method:"post",
                        url:"../controllers/chart.php",
                        data:{
                            action:"addchart",
                            nama:nama,
                            keterangan:keterangan
                        }
                    }).done(()=>{
                        cekupdate();
                    })
                }
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
                                console.log(arr[arr.length-1]);
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
        <?php
            Message::print("Inputan Kosong");
            Message::print("Nama Kembar");
        ?>
    </body>
</html>
