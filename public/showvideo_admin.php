
<?php
    require_once "../config/config.php";
    use Models\Video;

    $kategori = $_SESSION['namakategori'];
    
    // if((int)$id <=0) {
    //     echo 'The variable is NULL';
    // }else{}

    $idkategori = Video::getKategoribyName($kategori);
    // echo $idkategori->f_kategori;

    $kat = Video::getKategoribyId($idkategori->id);
    $video = Video::getVideobyKategori($idkategori->id);
    
    if (isset($_POST['btnback'])) {
        header("Location: halamanadmin.php");
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
    
</head>
<body>
    <h1>Kategori <?=$kategori?></h1>
    <table class="table table-dark table-striped">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Video</th>
        </thead>
        <tbody>
            <?php 
                foreach($video as $idx => $video){
                    ?>
                    <tr>
                        <td><label style="line-height: 350px;"> <?= $idx + 1 ?> </label></td>
                        <td><label style="line-height: 350px;"><?= $video->judul ?></label></td>
                        <td><object width="615" height="350" data="http://www.youtube.com/v/<?=$video->video?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?=$video->video?>" /></object></td> 
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <form action="" method="POST">
        <button type="submit" class="btn btn-primary" name="btnback">Back</button>
    </form>
</body>
</html>