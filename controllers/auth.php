<?php  

require_once "../config/config.php";

// include "../alert.php";

use Models\User;

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
        Message::add("Inputan Kosong", "Inputan harus terisi semua!");
        header("Location: ../index.php");
        // data ini harus kembali ke index.php
        //$title = "Field Kosong"; $msg = ""; $icon = "warning";
    }else{
        if ($username == "KITAKAYA@gmail.com" && $password == "000") {
            header("Location: ../public/halamanadmin.php");
            exit;
        }

        if ($username == "csKITAKAYA@gmail.com" && $password == "123") {
            $_SESSION["user"] = $ecustomer;
            header("Location: ../public/halamancs.php");
            exit;
        }

        if ($ecustomer == true) {
            // cek password
            $verifyPass = password_verify($_POST["pass"], $ecustomer->password);
            // cek dia udah verify email belum
            $cek = User::getStatus($_POST["username"],1);
            if ($cek == true) {
                // cek dia vip atau tidak
                $cekuservip = User::getRole($_POST["username"],1);
                if ($cekuservip == true) {
                    // cek pass sama hash sama tidak
                    if ($verifyPass) {
                        $_SESSION["user"] = $ecustomer;
                        // cek expired date
                        $id=$ecustomer->id;
                        $now=new DateTime();
                        $expire=new DateTime(User::getexpireddate($id)->expired);
                        if ($now<$expire) {
                            header("Location: ../public/halamanuservip.php");
                        } else {
                            User::updateexpdate($id,null);
                            User::updaterole($id,0);
                            header("Location: ../public/halamanuserbiasa.php");
                        }                       
                        exit;
                    }
                    else{
                        Message::add("Password Salah","Password yang Anda masukkan tidak sesuai!");
                        header("Location: ../index.php");
                    }
                    
                }
                else{
                    if ($verifyPass) {
                        $_SESSION["user"] = $ecustomer;
                        header("Location: ../public/halamanuserbiasa.php");
                        exit;
                    }
                    else{
                        Message::add("Password Salah","Password yang Anda masukkan tidak sesuai!");
                        header("Location: ../index.php");
                    }
                    
                } 
            }
            else{
                Message::add("Unverified Email","Email Anda belum terverifikasi!");
                header("Location: ../index.php");
                exit;
            }
        }
        else{
            Message::add("Email Tidak Terdaftar","Email Anda tidak ditemukan!");
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