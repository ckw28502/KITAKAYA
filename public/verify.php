<?php

    require_once "../config/config.php";
    use Config\Database;

    $message = '';

    $db = Database::instance();
    $hash = $_GET['hash'];
    $stmt = $db->query("SELECT * FROM user WHERE password='$hash'");
    $ambil = $stmt->fetchAll();

    if(isset($_GET['hash'])){
        if($ambil){
            if($ambil[0]->status == 0){
                $uquery = $db->query("UPDATE user SET status = 1 WHERE id = '".$ambil[0]->id."'");
                if($uquery){
                    $message = '<label class="text-success">Verifikasi email berhasil! Klik disini untuk login - <a href="../index.php">Login</a></label>';
                }
                else{
                    $message = 'ndabisa';
                }
            }else{
                $message = '<label class="text-info">Email telah terverifikasi!</label>';
            }  
        }
    }else{
        $message = '<label class="text-danger">Link tidak valid!</label>';
    }

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Verify</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body>
  
  <div class="container mt-5">
   <h1 align="center">Email Verification</h1><br>
  
   <h3 align="center"><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>