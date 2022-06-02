<?php
    use Utils\Message;
    use Models\service;
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
        <title>Halaman User VIP</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/punyaadmin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
           #btnkeluar{
                margin-left: 45px;
            }
            .rate{

            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;

            }

            .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            margin-right: 72%;
            }

            .rating>input {
            display: none
            }

            .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
            }

            .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
            }

            .rating>label:hover:before,
            .rating>label:hover~label:before {
            opacity: 1 !important
            }

            .rating>input:checked~label:before {
            opacity: 1
            }

            .rating:hover>input:checked~label:before {
            opacity: 0.4
            }
            
            .ratingg {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            margin-right: 70%;
            }

            .ratingg>input {
            display: none
            }

            .ratingg>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
            }

            .ratingg>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
            }

            .ratingg>label:hover:before,
            .ratingg>label:hover~label:before {
            opacity: 1 !important
            }

            .ratingg>input:checked~label:before {
            opacity: 1
            }

            .ratingg:hover>input:checked~label:before {
            opacity: 0.4
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
                            <a class="nav-link" href="../public/halamanhistorytransvip.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                History Transaksi 
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
                        <h1 class="mt-4">Customer Service</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Saham</li>
                        </ol>
                        <form action="../controllers/service.php" method="POST">
                            <label class="control-label"  for="namamenu">Pertanyaan</label>
                            <br>
                            <br>
                            <div class="controls">
                                <input type="text" class="form-control" id="namamenu" name="judul" placeholder="Pertanyaan">
                            </div>   
                            <br>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="btnaddser">Add</button>
                            </div>  
                        </form>
                        <br>
                        <?php 
                            $user = json_decode(json_encode($_SESSION["user"]), true);
                            $idmember = $user["id"];
                            $services = service::getbyidmember($idmember);

                        ?>
                        <form action="../controllers/service.php" method="POST">
                        <table class="table table-dark table-striped">
                            <thead>
                            <th>ID</th>

                                <th>Judul Pertanyaan</th>
                                <th>Rate</th>
                                <th>Chat</th>

                            </thead>
                            <tbody>
                                <?php   
                                    foreach($services as $idx=> $service){
                                        ?>
                                        <tr>
                                            
                                            <td><?=  $idx + 1?></td>
                                            <td><?=  $service->judul?></td>
                                            
                                            <?php
                                        if ( $service->rate!=null) {
                                            
                                            ?> 
                                            <form action="../controllers/service.php" method="POST">
                                            <td>
                                            <?php
                                            if ( $service->rate==5) {
                                            
                                            ?> 
                                            <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5" checked><label for="5">☆</label> 
                                            <input type="radio" name="rating" value="4" id="4" disabled><label for="4">☆</label> 
                                            <input type="radio" name="rating" value="3" id="3" disabled><label for="3">☆</label> 
                                            <input type="radio" name="rating" value="2" id="2" disabled><label for="2">☆</label> 
                                            <input type="radio" name="rating" value="1" id="1" disabled><label for="1">☆</label>
                                            </div>
                                            <?php
                                            }
                                            else if ($service->rate==4) {
                                                ?> 
                                            <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5" disabled><label for="5">☆</label> 
                                            <input type="radio" name="rating" value="4" id="4" checked><label for="4">☆</label> 
                                            <input type="radio" name="rating" value="3" id="3" disabled><label for="3">☆</label> 
                                            <input type="radio" name="rating" value="2" id="2" disabled><label for="2">☆</label> 
                                            <input type="radio" name="rating" value="1" id="1" disabled><label for="1">☆</label>
                                            </div>
                                            <?php
                                            }
                                            else if ($service->rate==3) {
                                                ?> 
                                            <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5" disabled><label for="5">☆</label> 
                                            <input type="radio" name="rating" value="4" id="4" disabled><label for="4">☆</label> 
                                            <input type="radio" name="rating" value="3" id="3" checked><label for="3">☆</label> 
                                            <input type="radio" name="rating" value="2" id="2" disabled><label for="2">☆</label> 
                                            <input type="radio" name="rating" value="1" id="1" disabled><label for="1">☆</label>
                                            </div>
                                                <?php
                                            }
                                            else if ($service->rate==2) {
                                                ?> 
                                            <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5" disabled><label for="5">☆</label> 
                                            <input type="radio" name="rating" value="4" id="4" disabled><label for="4">☆</label> 
                                            <input type="radio" name="rating" value="3" id="3" disabled><label for="3">☆</label> 
                                            <input type="radio" name="rating" value="2" id="2" checked><label for="2">☆</label> 
                                            <input type="radio" name="rating" value="1" id="1" disabled><label for="1">☆</label>
                                            </div>
                                            <?php
                                            }
                                            else if ($service->rate==1) {
                                                ?> 
                                            <div class="rating">

                                            <input type="radio" name="rating" value="5" id="5" disabled><label for="5">☆</label> 
                                            <input type="radio" name="rating" value="4" id="4" disabled><label for="4">☆</label> 
                                            <input type="radio" name="rating" value="3" id="3" disabled><label for="3">☆</label> 
                                            <input type="radio" name="rating" value="2" id="2" disabled><label for="2">☆</label> 
                                            <input type="radio" name="rating" value="1" id="1" checked><label for="1">☆</label>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td><button class="btn btn-primary" name="chat[<?=$service->id?>]">Chat</button></a></td>
                                            </form>
                                            <?php
                                        }
                                        else{  
                                            ?>
                                            <td>
                                            <form action="../controllers/service.php" method="POST">

                                            <div class="ratingg">  
                                                
                                                <button class="btn btn-primary" name="submitrating[<?=$service->id?>]">Submit</button>
                                                <input type="radio" name="rating[<?=$service->id?>]" value="5" id="5"><label for="5">☆</label> 
                                                <input type="radio" name="rating[<?=$service->id?>]" value="4" id="4"><label for="4">☆</label> 
                                                <input type="radio" name="rating[<?=$service->id?>]" value="3" id="3"><label for="3">☆</label> 
                                                <input type="radio" name="rating[<?=$service->id?>]" value="2" id="2"><label for="2">☆</label> 
                                                <input type="radio" name="rating[<?=$service->id?>]" value="1" id="1"><label for="1">☆</label>
                                            
                                               
                                            
                                            </div>
                                           
                                            </td>   
                                            
                                            <!-- <td><input type="text" id="keteranganmenu" name="rate[<?=$service->id?>]"><input type="submit" class="btn btn-success" name="submit[<?=$service->id?>]" value="Rate"/></input></td> -->
                                            <td><button class="btn btn-primary" name="chat[<?=$service->id?>]">Chat</button></a></td>
                                            </form>
                                    <?php
                                    }
                                    }

                                ?>
                        </tbody>
                    </table>
                    </form>
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
            Message::print("error");
            Message::print("success");
        ?>
    </body>
</html>
