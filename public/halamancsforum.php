<?php
    use Models\Video;


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
                    <h1 class="mt-4">Forum</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Members</li>
                    </ol>
                    <form action="../controllers/forum.php" method="POST">
                    <table class="table table-dark table-striped">
                            <thead>
                            <th>Nama Kategori</th>
                            <th>Forum</th>
                            
                            </thead>
                            <tbody>
                            <?php 
                                $categories = video::getAll();
                                
                            ?>       
                                <?php                     
                                    foreach($categories as $category){
                                        ?>
                                        <tr>
                                            <td><?=  $category->nama_kategori?></td>
                                            <td><button class="btn btn-primary" name="forum[<?=$category->id?>]">Forum</button></a></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>