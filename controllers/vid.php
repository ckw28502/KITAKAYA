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
            Message::add("Error",$result->message);
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
        
        Message::add("Success", "Berhasil Insert Video!");
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


    if (isset($_POST['btndelete'])) {
        $idkategori = $_POST['idkategori'];
        // echo $idkategori;
        Video::deleteKategori($idkategori);
        header("Location: ../public/halamanadminlistvideo.php");
    }

    if (isset($_POST['btnedit'])) {
        $idkategori = $_POST['idkategori'];
        unset($_SESSION['idkategori']);
        $_SESSION['idkategori'] = $idkategori;
        // echo $idkategori;
        
        header("Location: ../public/editkategori.php");
    }

    if (isset($_POST['btnsave'])) {
        $result = Validation::empty("namakategori");
        if(!$result->status){
            Message::add("Error",$result->message);
            header("Location: ../public/editkategori.php");
            exit;
        }

        $idkategori = $_SESSION['idkategori'];
        $input = $_POST['namakategori'];
        $hasil = Video::cekKategori($input);
        
        if($hasil == 0){ 
            Video::changeKategoriName($idkategori, $input);
            Message::add("Success", "Berhasil update nama");
        }else if($hasil == 1){
            Message::add("Error", "Nama Kategori sudah terdaftar");
        }
        
        header("Location: ../public/editkategori.php");
    }

    if (isset($_POST['btndeletevid'])) {
        $idvideo = $_POST['idvideo'];
        Video::deleteVideo($idvideo);
        header("Location: ../public/showvideo_admin.php");
    }

    if (isset($_POST['btneditvid'])) {
        $idvideo = $_POST['idvideo'];
        unset($_SESSION['idvideo']);
        $_SESSION['idvideo'] = $idvideo;
        // echo $idkategori;
        
        header("Location: ../public/editvideo.php");
    }
    
    if (isset($_POST['btnsavevid'])) {
        $result = Validation::empty("namavideo");
        if(!$result->status){
            Message::add("Error",$result->message);
            header("Location: ../public/editvideo.php");
            exit;
        }

        $idvideo = $_SESSION['idvideo'];
        $input = $_POST['namavideo'];

        Video::changeVideoName($idvideo, $input);
        Message::add("Success", "Berhasil update nama");
        
        header("Location: ../public/showvideo_admin.php");
    }
    
?>