<?php
    require_once "../config/config.php";
    use Models\htransaksi;
    use Utils\File;
    use Utils\Message;

    use Models\Validation;
    use Models\User;

    if (isset($_POST["btnTambah"])) {
        $file = File::get("fotobukti");
        if ($_POST["harga"]==120) {
            $harga=120000;
        }
        else if ($_POST["harga"]==500) {
            $harga=500000;           
        }
        else {
            $harga=1100000;            
        }
        $user = ($_SESSION["user"]);
        $bulan = $_POST["bulan"];
        $iduser = $user->id;
        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $transactiondate=$datetime->format('Y\-m\-d\ h:i:s');
        $transaksitemp = htransaksi::getByidmember($iduser);
        if($_FILES["fotobukti"]["name"]==""){
            Message::add("Error","Foto tidak boleh kosong");
            header("Location: ../public/halamanuserbiasasub.php");
            exit;
        }
        else if ($transaksitemp!=null) {
            Message::add("Error","sudah transaksi tetapi blm di konfirmasi oleh admin");
            header("Location: ../public/halamanuserbiasasub.php");
            exit;
        }
        else{
            
            $hasil = new htransaksi($iduser,$harga,File::$target_path.$iduser.".".$file->getExtension(),$transactiondate,$bulan);
            $hasil->save();

            $file->move($iduser.".".$file->getExtension());
            Message::add("Success","Mohon menunggu validasi pembayaran Anda!");
            
            header("Location: ../public/halamanuserbiasa.php");
            exit;
        }
        
    }
    if(isset($_POST['accept'])){
        $keys=key($_POST['accept']);
        $ids = explode(",", $keys);
        $idtransaksi=(int)$ids[0];
        $iduser=(int)$ids[1]; 
        $bulan=htransaksi::getbulan($idtransaksi);
        $tz_object = new DateTimeZone('Asia/Jakarta');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $expireddate=$datetime->format('Y\-m\-d\ h:i:s');
        $newDate = date('Y\-m\-d\ h:i:s', strtotime($expireddate. ' + '.$bulan->bulan.' months'));
        
        User::updateexpdate($iduser,$newDate);

        User::updaterole($iduser,1);
        $transaksitemp = htransaksi::acceptbyidtransaksi($idtransaksi);
        Message::add("VIP","Selamat!\nPendaftaran Anda sebagai VIP telah berhasil");
        header("Location: ../public/halamanadminvalidasi.php");


    }
    if(isset($_POST['reject'])){
        $idtransaksi=key($_POST['reject']);
        var_dump($idtransaksi);
        $transaksitemp = htransaksi::rejectbyidtransaksi($idtransaksi);
        Message::add("Gagal","Mohon maaf, pendaftaran Anda sebagai VIP ditolak");
        header("Location: ../public/halamanadminvalidasi.php");


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
    if (isset($_POST["search"])) {
        $nama=$_POST["nama"];
        $tglawal=$_POST["dateawal"];
        $tglakhir=$_POST["dateakhir"];
        $status=$_POST["status"];
        $_SESSION["history"]=($tglawal==null||$tglakhir==null) ? htransaksi::getforhistoryadmin($nama,$status) : htransaksi::getforhistoryadmin($nama,$status,$tglawal,$tglakhir,) ;
        header("Location: ../public/halamanadminvalidasi.php");
    }
?>