<?php
    require_once "../config/config.php";
    use Models\service;
    use Utils\Message;
    use Utils\Validation;

    //add service
    if(isset($_POST['btnaddser'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("judul");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/halamanuserbiasacs.php");
            exit;
        }
        $judul = $_POST['judul'];
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $idmember=$user["id"];
        
        $service = new service($judul, $idmember);
        $service->addservice();
        
        Message::add("success", "Berhasil Insert Service!");
        header("Location: ../public/halamanuserbiasacs.php");
        exit;
    }

    if(isset($_GET['idvid'])){
        $id = $_GET['id'];
        unset($_SESSION['namakategori']);
        $_SESSION['namakategori'] = $id;
        // $id = $_SESSION['idvideo'];
        // echo $id;
        header("Location: ../public/showvideo_admin.php");
    }
    
?>