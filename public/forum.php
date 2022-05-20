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
        body{
            width: 100%;
            height: 100vh;
            background-color: #b1bfd8;
            /* background: linear-gradient(150deg, #9600FF 10%,#AEBAF8 50%); */
        }
        #punyaeuser{
            text-align: center;
        }
        #asing{
            border: 4px;
        }
        .coba{
            border: 4px solid black;
            border-radius: 10px;
        }
        
    </style>

</head>
<body>
    <div class="container-fluid px-6">
        <main>
            <div>
                <form action="../controllers/forum.php" method="POST">
                    <h1>Posts</h1>
                    
                    <div class="coba">
                              
                        <?php     
                        $idkategori=$_SESSION['idkategori'];
                        $posts = post::getbyidkategori($idkategori);                
                        foreach($posts as $post){
                            
                            ?> 
                            <input id="punyaeuser" class="form-control" type="text" value="Judul Post : <?= $post->Judul?>" aria-label="readonly input example" readonly>
                            <input id="punyaeuser" class="form-control" type="text" value="Isi Post : <?= $post->isi?>" aria-label="readonly input example" readonly>
                            <input id="punyaeuser" class="form-control" type="text" value="Poster : <?= $post->namamember?>" aria-label="readonly input example" readonly>
                            <input type="text" id="namamenu" name="isicomment" placeholder="Isi reply" class="form-control">
                            <td><button class="btn btn-primary" name="comment[<?=$post->id?>]">Reply</button></a></td>
                            <br>
                            <?php 
                                
                            ?>   
                            <?php      
                                $idpost=$post->id;
                                $comments = comment::getbyidcomment($idpost);                
                                foreach($comments as $comment){
                                    
                                    ?> 
                                     <form action="../controllers/forum.php" method="POST">
                                    <br>
                                    <input id="punyaeuser" class="form-control" type="text" value="Pereply : <?= $comment->namamember?>" aria-label="readonly input example" readonly>
                                    <input id="punyaeuser" class="form-control" type="text" value="Isi : <?= $comment->isi?>" aria-label="readonly input example" readonly>
                                    
                                    <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control">
                                    <td><button class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]">Reply</button></a></td>
                                    <br>
                                    </form>

                                    <?php
                                        $idcomment=$comment->id;
                                        $comments = comment::getbyidreply($idpost,$idcomment);
                                        foreach($comments as $comment){
                                    ?> 
                                     <form action="../controllers/forum.php" method="POST">
                                    <br>
                                    <input id="punyaeuser" class="form-control" type="text" value="Pereply : <?= $comment->namamember?>" aria-label="readonly input example" readonly>

                                        <input id="punyaeuser" class="form-control" type="text" value="Isi : <?= $comment->isi?>" aria-label="readonly input example" readonly>
                                        <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control">
                                        <td><button class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]">Reply</button></a></td>
                                        </form>
                                    <br> 
                                    
                                    <?php
                                         $idcomment=$comment->id;                                  
                                         do {
                                            $comments = comment::getbyidreply($idpost,$idcomment);
                                            foreach($comments as $comment){
                                    
                                                ?> 
                                                <br>
                                                <input id="punyaeuser" class="form-control" type="text" value="Penulis: <?= $comment->namamember?>" aria-label="readonly input example" readonly>

                                                <input id="punyaeuser" class="form-control" type="text" value="Reply: <?= $comment->isi?>" aria-label="readonly input example" readonly>
                                                <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control">
                                                <td><button class="btn btn-primary" name="replycomment[<?=$idpost?>,<?=$comment->id?>]">Reply</button></a></td>
            
                                                <br>
                                                <?php
                                                $idcomment=$comment->id;
                                                    
                                                    
                                            } 
                                        }while ($comments!=null);   

                                        }
                            
                                }                                                                 
                            }
                        ?>
                        <br>
                    </div>
                    </form>
                    <br>
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
                
                <br>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>