<?php
    require_once "../config/config.php";
    use Models\chat;
    use Models\User;

    use Utils\Message;
    use Utils\Validation;

    //add service
    if(isset($_POST['btnaddchat'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("isi");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/chat.php");
            exit;
        }
        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $waktutrans=$datetime->format('Y\-m\-d\ h:i:s');   
        $isi = $_POST['isi'];
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $email=$user["email"];
        $cekusercs = User::getRole($email,2);
        if ($cekusercs == true) {
            $pengirim=1;
        }
        else{
            $pengirim=0;
        }
        $idservice=$_SESSION['idservice'];     
        $chat = new chat($idservice,$isi,$waktutrans,$pengirim);
        $chat->addchat();
        Message::add("success", "Berhasil Insert Chat!");
        header("Location: ../public/chat.php");
        exit;
    }

    if (isset($_POST["balikae"])) {
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $email=$user["email"];
        $cekusercs = User::getRole($email,2);
        if ($cekusercs == true) {
            header("Location: ../public/halamancs.php");
            exit;
        }
        else{
            $cekuserbv = User::getRole($email,1);
            if ($cekuserbv == true) {
                header("Location: ../public/halamanuservipcs.php");
                exit;
            }
            else{
                header("Location: ../public/halamanuserbiasacs.php");
                exit;
            }
        }
    }
    
?>