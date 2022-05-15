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
    <style>
        .container{
            display:inline-block;
            top:100px;
        }
        .chat{
            width:200px;
            height:300px;
            border:black 1px solid;
        }
        p{
            margin:0px 0px 0px 0px;
        }
        button{
            margin:10px 10px 10px 0px;
        }
        #chat1{
            background-color:lightskyblue;
        }
        #chat2{
            background-color:blanchedalmond;
        }
    </style>

</head>

<body>
<form action="../controllers/chat.php" method="POST">
    <h1>Chat</h1>
    <?php 
        $idservice=$_SESSION['idservice'];
        $chats = chat::getbyidservice($idservice);
    ?>       
            <?php                     
        foreach($chats as $chat){
            if ($chat->pengirim==1) {         
            ?> 
            
                <p align="left"><?= $chat->isi?></p>
            <?php
            }
            else {
                ?> 
                <p align="right"><?= $chat->isi?></p>
                <?php
            }
        }
    ?>
       <form action="../controllers/service.php" method="POST">
        <label class="control-label"  for="namamenu">Chat</label>
        <div class="controls">
            <input type="text" id="namamenu" name="isi" placeholder="isi" class="input-xlarge">
        </div>   
        <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnaddchat" >Chat</button>
        </div>  
        </form>
   
    </form>
</body>
</html>