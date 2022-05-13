<?php
    require_once "../config/config.php";
    include_once("phpmailer/phpmailer-load.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use Models\User;

    if (isset($_REQUEST["ayoregis"])) {
        $nama = $_REQUEST["nama"];
        $email = $_REQUEST["email"];
        $pass = $_REQUEST["pass"];
        $umur = $_REQUEST["umur"];

        if ($nama != "" && $email != "" && $pass != "" && $umur != "") {
            if(User::getByUsername($_POST["email"])){
                $cekemail = true;
                exit;
            }

            if ($cekemail = true) {
                echo("email e podo");
                $user = new User($_POST);
                $user->save();
                try {
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 0;                   //Enable verbose debug output
                    // Send using SMTP
                    $mail->isSMTP();
                    // Set the SMTP server to send through
                    $mail->Host       = 'smtp.gmail.com';
                    // Enable SMTP authentication
                    $mail->SMTPAuth   = true;
                    // SMTP username
                    $mail->Username   = 'ibewe25@gmail.com';
                    // SMTP password
                    $mail->Password   = 'esek212121';
                    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged            
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('ivanderkw2@gmail.com', 'KITA KAYA');
                    $mail->addAddress($email, 'User');     // Add a recipient
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Email Verification';

                    $mail->Body ="<div id=':103' class='ii gt'>                        
                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                        
                        <tbody><tr>
                            <td bgcolor='#9c5ecb' align='center'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px'>
                                    <tbody><tr>
                                        <td align='center' valign='top' style='padding:40px 10px 40px 10px'> </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#9c5ecb' align='center' style='padding:0px 10px 0px 10px'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px'>
                                    <tbody><tr>
                                        <td bgcolor='#ffffff' align='center' valign='top' style='padding:40px 20px 20px 20px;border-radius:4px 4px 0px 0px;color:#111111;font-family:'Lato',Helvetica,Arial,sans-serif;font-size:48px;font-weight:400;letter-spacing:4px;line-height:48px
                                        >
                                            <h1 style='font-size:30px;font-weight:400;margin:2;'>Welcome, ".$nama." !</h1>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#f4f4f4' align='center' style='padding:0px 10px 0px 10px'>
                                <table border='0' cellpadding='0' cellspacing='0 width='100%' style='max-width:600px'>
                                    <tbody><tr>
                                        <td bgcolor='#ffffff' align='left' style='padding:20px 30px 40px 30px;color:#666666;font-family:'Lato',Helvetica,Arial,sans-serif;font-size:18px;font-weight:400;line-height:25px'>
                                            <p style='margin-left:10%;margin-right:8%'>Terima kasih sudah mendaftarkan dirimu di KITAKAYA. Silahkan verifikasi alamat emailmu dengan klik tautan berikut :</p>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor='#ffffff' align='left'>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                <tbody><tr>
                                                    <td bgcolor='#ffffff' align='center' style='padding:20px 30px 60px 30px'>
                                                        <table border='0' cellspacing='0' cellpadding='0'>
                                                            <tbody><tr>
                                                                <td align='center' style='border-radius:10px' bgcolor='#9C5ecb
                                                                        '><a href='localhost/Proyek_V2/public/verify.php?hash=".$pass.
                                                                        "' style='font-size:20px;font-family:Helvetica,Arial,sans-serif;color:#ffffff;text-decoration:none;color:#ffffff;text-decoration:none;padding:15px 25px;border-radius:2px;display:inline-block'>Verify Account</a></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr> 
                                     
                                    
                                    <tr>
                                        <td bgcolor='#ffffff' align='left' style='padding:0px 30px 20px 30px;color:#666666;font-family:'Lato',Helvetica,Arial,sans-serif;font-size:18px;font-weight:400;line-height:25px'>
                                            <p style='margin-left:10%;margin-right:8%'>Penting untuk memiliki akun dengan alamat email yang akurat karena semua transaksi anda tercatat di KITAKAYA. Abaikan email ini bila kamu tidak pernah mendaftar ke KITAKAYA</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor='#ffffff' align='left' style='padding:0px 30px 40px 30px;border-radius:'0px 0px 4px 4px';color:'#666666';font-family:'Lato',Helvetica,Arial,sans-serif;font-size:18px;font-weight:400;line-height:25px'>
                                            <p style='margin-left:10%;margin-right:10%'>Best Regards,<br>KITAKAYA</p>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        </tbody></table></div><div class='yj6qo'></div><div class='adL'>
                    </div></div></div>";

                    $mail->send();
                    echo("berhasil");
                } catch(Exception $e) {
                    echo($e);
                }
                header("Location: ../public/halamanregister.php");
            }else{
                
                
            }
        }
        else{
            echo("isi semua field");
            header("Location: ../public/halamanregister.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background: -moz-linear-gradient(-45deg,  #EA5C54  0%, #bb6dec 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#EA5C54 ), color-stop(100%,#bb6dec)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* IE10+ */
            background: linear-gradient(135deg,  #EA5C54  0%,#bb6dec 100%); 
        }
    </style>
</head>
<body>  
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="../assets/css/tampilanregis.jpg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-5 col-lg-5 col-xl-5 offset-xl-1">
                <form action="#" method="POST">
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Email</label>
                        <input type="email" id="form1Example13" class="form-control form-control-lg" name="email"/>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg" name="pass"/>
                    </div>

                    <!-- Nama input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example23">Nama</label>
                        <input type="text" class="form-control form-control-lg" name="nama"/>
                    </div>

                    <!-- Umur input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Umur</label>
                        <input type="text" class="form-control form-control-lg" name="umur"/>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="ayoregis">Register</button>
                    <div>Sudah punya akun? <a href="../index.php">Login Sekarang</a></div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>