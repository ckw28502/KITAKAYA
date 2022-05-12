<?php
    require_once "../config/config.php";
    use Models\Video;
    use Utils\Message;
    use Utils\Validation;

    //add video
    if(isset($_POST['btnaddvid'])){ 
        //cek apakah ada field kosong
        $result = Validation::empty("kategorivideo","judulvideo", "linkvideo");
        if(!$result->status){
            Message::add("error",$result->message);
            header("Location: ../public/halamanadmin.php");
            exit;
        }

        //cek apakah kategori sudah ada di database, jika belom maka insert baru
        $kategori = $_POST['kategorivideo'];
        $judul = $_POST['judulvideo'];
        $video = $_POST['linkvideo'];
        $hasil = Video::cekKategori($kategori);

        
        $code = substr($video, strpos($video, "=") + 1);    
        
        if($hasil == 0){ //jika 0, maka insert kategori baru tsb
            Video::insertKategori($kategori);
        }

        $k = Video::getKategori($kategori);
        // echo $k->id;
        $video = new Video($judul, $k->id, $code);
        $video->addvideo();
        
        Message::add("success", "Berhasil Insert Video!");
        header("Location: ../public/halamanadmin.php");
        exit;
    }

    if(isset($_GET['idvid'])){
        $id = $_GET['id'];
        unset($_SESSION['idvideo']);
        $_SESSION['idvideo'] = $id;
        // $id = $_SESSION['idvideo'];
        // echo $id;
        header("Location: ../public/showvideo_admin.php");
    }
    
?>