<?php
use Utils\Message;
use Models\chat;
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
            background-image: linear-gradient(160deg, #b1bfd8 0%, #6782b4 74%);
            /* background: linear-gradient(150deg, #9600FF 10%,#AEBAF8 50%); */
        }
        #punyaeuser{
            text-align: right;
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
                <form action="../controllers/chat.php" method="POST">
                    <h1>Riwayat Chat</h1>
                    
                    <div class="coba">
                        <?php 
                            $idservice=$_SESSION['idservice'];
                            $chats = chat::getbyidservice($idservice);
                        ?>       
                            <?php                     
                                foreach($chats as $chat){
                                    if ($chat->pengirim==1) {         
                                    ?> 
                                        <input id="punyaecs" class="form-control" type="text" value="Customer Service : <?= $chat->isi?>" aria-label="readonly input example" readonly>
                                        <br>
                                    <?php
                                    }
                                    else {
                                        ?> 
                                        <input id="punyaeuser" class="form-control" type="text" value="Me : <?= $chat->isi?>" aria-label="readonly input example" readonly>
                                        <br>
                                        <?php
                                    }
                                }
                            ?>
                        <br>
                    </div>
                    
                    <form action="../controllers/service.php" method="POST">
                        <h1>Chat</h1>
                        
                        <input type="text" id="namamenu" name="isi" placeholder="Chat Yang ingin disampaikan ke customer" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-primary" name="btnaddchat" >Chat</button>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-danger" name="balikae">Back To Dashboard</button>
                    </form>
                </form>
                <br>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>