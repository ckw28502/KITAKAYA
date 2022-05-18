<?php  

require_once "../config/config.php";

// include "../alert.php";

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
        // data ini harus kembali ke index.php
        //$title = "Field Kosong"; $msg = ""; $icon = "warning";
    }else{
        if ($username == "admin" && $password == "000") {
            header("Location: ../public/halamanadmin.php");
            exit;
        }

        if ($ecustomer == true) {

            // cek dia udah verify email belum
            $cek = User::getStatus($_POST["username"],1);
            if ($cek == true) {
                // cek dia vip atau tidak
                $cekuservip = User::getRole($_POST["username"],1);
                if ($cekuservip == true) {
                    $_SESSION["user"] = $ecustomer;
                    header("Location: ../public/halamanuservip.php");
                    exit;
                }
                else{
                    $cekusercs = User::getRole($_POST["username"],2);
                    if ($cekusercs == true) {
                        $_SESSION["user"] = $ecustomer;
                        header("Location: ../public/halamancs.php");
                        exit;
                    }
                    else{
                        $_SESSION["user"] = $ecustomer;
                        header("Location: ../public/halamanuserbiasa.php");
                        exit;
                    }
                } 
            }
            else{
                header("Location: ../index.php");
                exit;
            }
        }
        else{
            header("Location: ../index.php");
            exit;
        }
    }
}

// button gae pindah ke regis tok
if (isset($_POST["regis"])) {
    header("Location: ../public/halamanregister.php");
    exit;
}

// untuk logout
if(isset($_GET["logoutcusbiasa"])){
    unset($_SESSION["user"]);
    header("Location: ../index.php");
    exit;
}

if(isset($_GET["logoutcusvip"])){
    unset($_SESSION["user"]);
    header("Location: ../index.php");
    exit;
}
 


?>