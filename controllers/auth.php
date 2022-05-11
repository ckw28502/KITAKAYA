<?php 

require_once "../config/config.php";

use Models\User;
use Models\toko;

use Utils\Message;
use Utils\Validation;

// Controller adalah jembatan antar tampilan(HTML) dengan Model
// Pengecekan validasi juga biasanya dilakukan di Controller

// proses yang dilakukan saat login
if(isset($_POST["login"])){
    $ecustomer = User::getByUsername($_POST["username"]);

    $username = $_POST["username"];
    $password = $_POST["pass"];

    if ($username == "" || $password == "") {
        header("Location: ../index.php");
    }else{
        if ($username == "admin" && $password == "000") {
            header("Location: ../public/halamanadmin.php");
            exit;
        }

        if ($ecustomer == true) {
            $cek = User::getStatus($_POST["username"],1);
            if ($cek == true) {
                header("Location: ../public/halamanuserbiasa.php");
                exit;
            }
            else{
                header("Location: ../index.php");
            }
        }
        else{
            header("Location: ../index.php");
        }
    }
}

// button gae pindah ke regis tok
if (isset($_POST["regis"])) {
    header("Location: ../public/halamanregister.php");
    exit;
}



?>