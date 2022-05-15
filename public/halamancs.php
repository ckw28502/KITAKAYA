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
</head>
<body>
<form action="../controllers/service.php" method="POST">

    <h1>Bisa cs nya</h1>
    <?php 
               
                $services = service::getAll();

            ?>
            <table border=1  >
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
                        <td><?= $service->rate ?></td>
                        <td><button name="chat[<?=$service->id?>]">Chat</button></a></td>
                    </tr>
                    <?php
                }

            ?>
        </tbody>
    </table>
    </form>
</body>
</html>