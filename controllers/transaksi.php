<?php
    require_once "../config/config.php";
    use Models\htransaksi;
    use Utils\File;
    use Models\Validation;
    use Models\User;

    if (isset($_POST["btnTambah"])) {
        $file = File::get("fotobukti");
        
        $harga = $_POST["harga"];
        $user = ($_SESSION["user"]);
        $iduser = $user->id;
        
        $hasil = new htransaksi($iduser,$harga,File::$target_path.$iduser.".".$file->getExtension());
        $hasil->save();

        $file->move($iduser.".".$file->getExtension());

        User::updaterole($iduser,1);
        header("Location: ../public/halamanuserbiasa.php");
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