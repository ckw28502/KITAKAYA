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
        unset($_SESSION['namakategori']);
        $_SESSION['namakategori'] = $id;

        header("Location: ../public/showvideo_admin.php");
    }

    if(isset($_GET['idvidVIP'])){
        $id = $_GET['id'];
        unset($_SESSION['namakategori']);
        $_SESSION['namakategori'] = $id;

        header("Location: ../public/showvideo_uservip.php");
    }

    if(isset($_GET['watch'])){
        $id = $_GET['idyt'];
        unset($_SESSION['yt']);
        $_SESSION['yt'] = $id;

        //save ke pb
        $user = $_SESSION["user"];
        $userid = $user->id;
        // $munculkan = $user->nama;
        $kategori = $_SESSION['namakategori'];
        $idkategori = Video::getKategoribyName($kategori);
        $idkategori = $idkategori->id;
        $idvideo = $_GET['idv'];
        //cek sudah ada apa belum
        $cek = Video::cekPB($userid, $idkategori, $idvideo);
        // echo $cek->c;
        if ($cek->c == 0) {
            Video::insertPB($userid, $idkategori, $idvideo);
        }
         header("Location: ../public/ytplayer.php");
    }

    if(isset($_GET['idvidBIASA'])){
        $id = $_GET['id'];
        unset($_SESSION['namakategori']);
        $_SESSION['namakategori'] = $id;

        header("Location: ../public/showvideo_userbiasa.php");
    }
    
    
?>