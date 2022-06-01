
<?php
    require_once "../config/config.php";
    use Utils\Message;
    use Models\Video;

    $idvideo = $_SESSION['idvideo'];
    
    // if((int)$id <=0) {
    //     echo 'The variable is NULL';
    // }else{}

    // $idkategori = Video::getKategoribyName($kategori);
    // // echo $idkategori->f_kategori;

    $kat = Video::getVideobyId($idvideo);
    // $video = Video::getVideobyKategori($idkategori->id);
    
    if (isset($_POST['btnback'])) {
        header("Location: showvideo_admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Video</title>
    
    <style>
        body{
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #9600FF 10%,#AEBAF8 50%);
        }
        #buatkata{
            text-align: center;
        }
        #tulisan{
            color: black;
        }
    </style>
</head>
<body>
    <div id="layoutSidenav_content">
        <main>
                <h1 style="text-align: center">Edit Video</h1><br><br>
                <div style="padding-left: 40%;">
                    <form action="../controllers/vid.php" method="POST">
                        <label for="fname">Judul Video</label>
                        <input type="text" id="fname" name="namavideo" value="<?=$kat->judul?>">
                        <button type="submit" class="btn btn-success" name="btnsavevid" id="kembali">Save</button>
                    </form>
                </div>

                <form action="" method="POST" style="padding-left: 50px;">
                    <br>
                    <button type="submit" class="btn btn-primary" name="btnback" id="kembali">Back</button>
                </form>
            </div>
        </main>
    </div>
    <?php 
            Message::print("Error");
            Message::print("Success");
    ?>
</body>
</html>