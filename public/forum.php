<?php
use Utils\Message;
use Models\post;
use Models\comment;

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #b1bfd8;
        }

        .card {
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }  

        .badge{
            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef;
        }


        .form-check-input{
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer;
        }


        .form-check-input:focus{
            box-shadow: none;
        }

        .reply{

            margin-left: 12px;
        }

        .reply small{

            color: #b7b4b4;

        }

        .reply small:hover{
            color: green;
            cursor: pointer;
        }
        
    </style>

</head>
<body>
    <div class="container mt-5">
        <div class="row  d-flex justify-content-center">
            <div class="col-md-8">
                <form action="../controllers/forum.php" method="POST">
                    <?php     
                        $idkategori=$_SESSION['idkategori'];
                        $posts = post::getbyidkategori($idkategori);                
                        foreach($posts as $post){
                            $input = $post->tanggal;
                            $lengkap = strtotime($input);
                            $date=date('d-M-Y', $lengkap);
                            $time=date('h:i:s', $lengkap);
                            ?>
                            <hr>
                                <div class="card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            <form action="../controllers/forum.php" method="POST">
                                                <h3>Posts</h3>
                                                <h4><?= $date?></h4>
                                                <h4><?= $time?></h4>

                                                <h4>Judul Post : <?= $post->Judul?></h4>
                                                <h4>Isi Post : <?= $post->isi?></h4>
                                                <h4>Poster : <?= $post->namamember?></h4>
                                                <input type="text" id="namamenu" name="isicomment" placeholder="Isi reply" class="form-control">
                                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                    <button class="btn btn-primary" name="comment[<?=$post->id?>]">Reply</button>
                                                </div>
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            <?php 
                                
                            ?>   
                            <?php      
                                $idpost=$post->id;
                                $comments = comment::getbyidcomment($idpost);                
                                foreach($comments as $comment){
                                    $input = $comment->tanggal;
                                    $lengkap = strtotime($input);
                                    $date=date('d-M-Y', $lengkap);
                                    $time=date('h:i:s', $lengkap);
                                    ?> 
                                    <form action="../controllers/forum.php" method="POST">
                                        <br>
                                        <span>
                                            <h4 style="margin-left: 20px;"><?= $date?></h4>
                                            <h4 style="margin-left: 20px;"><?= $time?></h4>
                                            <h4 style="margin-left: 20px;">Pereply : <?= $comment->namamember?></h4>
                                            <h4 style="margin-left: 20px;">Isi : <?= $comment->isi?></h4>
                                            <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control" style="margin-left: 20px;">
                                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                <button style="margin-left: 20px;" class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]">Reply</button>
                                            </div>
                                        </span>
                                       
                                    </form>

                                    <?php
                                        $idcomment=$comment->id;
                                        $comments = comment::getbyidreply($idpost,$idcomment);
                                        foreach($comments as $comment){
                                            $input = $comment->tanggal;
                                            $lengkap = strtotime($input);
                                            $date=date('d-M-Y', $lengkap);
                                            $time=date('h:i:s', $lengkap);
                                    ?> 
                                    <form action="../controllers/forum.php" method="POST">
                                        <br>
                                        <span>
                                            <h4 style="margin-left: 40px;"><?= $date?></h4>
                                            <h4 style="margin-left: 40px;"><?= $time?></h4>
                                            <h4 style="margin-left: 40px;">Pereply : <?= $comment->namamember?></h4>
                                            <h4 style="margin-left: 40px;">Isi : <?= $comment->isi?></h4>
                                            <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control" style="margin-left: 40px;">
                                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                <button style="margin-left: 40px;" class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]">Reply</button>
                                            </div>
                                        </span>
                                    </form>
                                    <br>
                                    
                                    <?php
                                         $idcomment=$comment->id;                                  
                                         do {
                                            $comments = comment::getbyidreply($idpost,$idcomment);
                                            foreach($comments as $comment){
                                                $input = $comment->tanggal;
                                                $lengkap = strtotime($input);
                                                $date=date('d-M-Y', $lengkap);
                                                $time=date('h:i:s', $lengkap);
                                                ?> 
                                                <form action="../controllers/forum.php" method="POST">
                                                <span>
                                                    <br>
                                                    <h4 style="margin-left: 60px;"><?= $date?></h4>
                                                    <h4 style="margin-left: 60px;"><?= $time?></h4>
                                                    <h4 style="margin-left: 60px;">Penulis : <?= $comment->namamember?></h4>
                                                    <h4 style="margin-left: 60px;">Reply : <?= $comment->isi?></h4>
                                                    <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control" style="margin-left: 60px;">
                                                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                        <button class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]" style="margin-left: 60px;">Reply</button>
                                                    </div>
                                                    </span>
                                                </form>
                                                <?php
                                                $idcomment=$comment->id;    
                                            } 
                                        }while ($comments!=null);   

                                        }
                                }                                                                 
                            }
                        ?>
                </form>
            </div>
        </div>
        <form action="../controllers/forum.php" method="POST">
            <h1>Post</h1>
            <input type="text" id="namamenu" name="judul" placeholder="Post Yang ingin disampaikan" class="form-control"> 
            <br>               
            <input type="text" id="namamenu" name="isi" placeholder="Isi Yang ingin disampaikan" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary" name="btnaddpost" >Post</button>
            <br>
            <br>
            <button type="submit" class="btn btn-danger" name="balikae">Back To Dashboard</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <?php
        Message::print("Error");
        Message::print("Success");
    ?>
</body>
</html>