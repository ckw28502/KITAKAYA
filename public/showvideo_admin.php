
<?php
    require_once "../config/config.php";
    use Models\Video;
    use Utils\Message;

    $kategori = $_SESSION['namakategori'];
    
    // if((int)$id <=0) {
    //     echo 'The variable is NULL';
    // }else{}

    $idkategori = Video::getKategoribyName($kategori);
    // echo $idkategori->f_kategori;

    $kat = Video::getKategoribyId($idkategori->id);
    $video = Video::getVideobyKategori($idkategori->id);
    
    if (isset($_POST['btnback'])) {
        header("Location: halamanadminlistvideo.php");
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
            height: 100%;
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
            <div class="container-fluid px-4">
                <h1 id="buatkata">Kategori <?=$kategori?></h1>
                <ol class="breadcrumb mb-4">
                    <li id="tulisan">Kumpulan Video</li>
                </ol>
                <table class="table table-dark table-striped">
                    <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Video</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($video as $idx => $video){
                                ?>
                                <tr>
                                    <td><label style="line-height: 350px;"> <?= $idx + 1 ?> </label></td>
                                    <td><label style="line-height: 350px;"><?= $video->judul ?></label></td>
                                    <td><object width="500" height="300" data="http://www.youtube.com/v/<?=$video->video?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?=$video->video?>" /></object></td> 
                                    <td>
                                        <form action="../controllers/vid.php" method="POST" style="line-height: 350px;">
                                            <button type="submit" class="btn btn-primary" name="btneditvid" id="edit" >Edit</button>
                                            <button type="submit" class="btn btn-danger" name="btndeletevid" id="delete" onclick="return confirm('Are you sure?')">Delete</button>
                                            <input type="hidden" name="idvideo" value="<?= $video->id ?>"/>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>

                <form action="" method="POST">
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