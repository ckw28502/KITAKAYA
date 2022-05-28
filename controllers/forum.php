<?php
    require_once "../config/config.php";
    use Models\post;
    use Models\comment;
    use Models\User;

    use Utils\Message;
    use Utils\Validation;

    //add service
    if(isset($_POST['btnaddpost'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("judul","isi");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/forum.php");
            exit;
        }
        $judul = $_POST['judul'];
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $namauser=$user["nama"];
        $isi = $_POST['isi'];  
        $idkategori =$_SESSION['idkategori'];
        $post = new post($judul,$isi,$namauser,$idkategori);
        $post->addpost();
        
        Message::add("success", "Berhasil Post!");
        header("Location: ../public/forum.php");
        exit;
    }
    if(isset($_POST['comment'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("isicomment");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/forum.php");
            exit;
        }
        $idpost=key($_POST['comment']);
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $namauser=$user["nama"];

        $isicomment = $_POST['isicomment'];  
        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $waktureply=$datetime->format('Y\-m\-d\ h:i:s'); 
        $reply=-1;
        $comment = new comment($idpost,$namauser,$isicomment,$waktureply,$reply);
        $comment->addcomment();
        
        Message::add("success", "Berhasil reply!");
        header("Location: ../public/forum.php");
        exit;
    }
    if(isset($_POST['replycomment'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("isireplycomment");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/forum.php");
            exit;
        }
        $idpost=key($_POST['replycomment']);
        $ids = explode(",", $idpost);
        $idpost=(int)$ids[0];
        $idreply=(int)$ids[1]; 
        $user = json_decode(json_encode($_SESSION["user"]), true);
        $namauser=$user["nama"];

        $isireplycomment = $_POST['isireplycomment'];  
        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $waktureply=$datetime->format('Y\-m\-d\ h:i:s'); 
        
        $comment = new comment($idpost,$namauser,$isireplycomment,$waktureply,$idreply);
        $comment->addcomment();
        
        Message::add("success", "Berhasil reply!");
        header("Location: ../public/forum.php");
        exit;
    }
    
    if(isset($_POST['forum'])){
        $_SESSION['idkategori']=key($_POST['forum']);
        header("Location: ../public/forum.php");
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