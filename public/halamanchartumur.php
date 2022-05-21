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
                        <h1 class="mt-4">Chart Umur</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Umur</li>
                        </ol>
                        <br>
                        <!-- <select name="" id="angka"></select> -->
                        <canvas id="chart"></canvas>
                        <!-- <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div></div> -->
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../utils/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                var chart;
                $.ajax({
                    method:"get",
                    url:"../controllers/umur.php",
                    data:{
                        action:"getumur"
                    }
                }).done((d)=>{
                    let temp = JSON.parse(d);
                    // console.log(temp);
                    let arrumur = [];
                    let arrjumlah = [];
                    temp.forEach(element => {
                        arrumur.push(element["umur"]);
                        arrjumlah.push(element["jumlah"]);
                        
                    });
                    // console.log(arrumur);
                    const labels = arrumur;
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'umur',
                            data: arrjumlah,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    };
                    const config={
                        type:"bar",
                        data: data,
                        options: {
                            scales: {
                            y: {
                                beginAtZero: true
                                }
                            }
                        },
                    };
                    chart=new Chart($("canvas"),config);
                })
            });
        </script>
    </body>
</html>
