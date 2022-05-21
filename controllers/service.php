<?php
    require_once "../config/config.php";
    use Models\service;
    use Models\User;

    use Utils\Message;
    use Utils\Validation;
    
    function back()
    {
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
        exit;
    }
    //add service
    if(isset($_POST['btnaddser'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("judul");
        if(!$result->status){
            Message::add("error","gagal Insert Service");
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

    if(isset($_POST['chat'])){
        $id = $_GET['id'];
        unset($_SESSION['namakategori']);
        $_SESSION['namakategori'] = $id;
        // $id = $_SESSION['idvideo'];
        // echo $id;
        header("Location: ../public/showvideo_admin.php");
    }
    if(isset($_POST['submit'])){
        
        $rate=$_POST['rate'];
        foreach ($rate as $value) {
            $rate=$value;
        }
        

        

        if (is_numeric($rate)) {
            if ($rate>0 && $rate<6) {
                $idservice=key($_POST['rate']);
                service::rate($rate,$idservice);
                Message::add("success", "Berhasil Rate Service!");
                back();
            }
            else {
                Message::add("error", "rate harus diantara 1-5!");
                back();
            }           
        }
        else {
            Message::add("error", "rate harus diisi dan harus berupa angka!");
            back();
        }

    }
    if(isset($_POST['chat'])){
        $_SESSION['idservice']=key($_POST['chat']);
        header("Location: ../public/chat.php");


    }
    
?>