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
?>