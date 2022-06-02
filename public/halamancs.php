<?php
use Utils\Message;
use Models\service;
    require_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Customer Service</title>
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
        <a class="navbar-brand ps-3" href="halamancs.php">KITAKAYA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <h3 style="color: white;">Welcome, Customer Service</h3>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                        <div class="sb-sidenav-menu-heading">Customer Service Menu</div>
                        <a class="nav-link" href="../public/halamancs.php">
                            <div class="sb-nav-link-icon"><i class="far fa-comment-dots"></i></div>
                            Chat
                        </a>
                        <a class="nav-link" href="../public/halamancsforum.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                            Forum
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Chats</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Members</li>
                    </ol>
                    <form action="../controllers/service.php" method="POST">
                        <?php 
                                
                            $services = service::getAll();
                            $user = json_decode(json_encode($_SESSION["user"]), true);
                            $role=$user["role"];
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

                                            <div>  
                                                <p>No rate</p>
                                                
                                                
                                               
                                            
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
                    </form>
                    <br>
                    <div style="height: 100vh"></div>
                    <div class="card mb-4"><div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div></div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>