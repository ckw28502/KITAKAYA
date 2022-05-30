
<?php
    require_once "../config/config.php";
    use Models\Video;

    $kategori = $_SESSION['namakategori'];
    


    $idkategori = Video::getKategoribyName($kategori);
    // echo $idkategori->f_kategori;

    $kat = Video::getKategoribyId($idkategori->id); //rasae kok ws g perlu ini
    $video = Video::getVideobyKategoriLIMIT($idkategori->id);
    


    if (isset($_POST['btnback'])) {
        header("Location: halamanuserbiasa.php");
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
            <div class="container-fluid px-4">
                <h1 id="buatkata">Kategori <?=$kategori?></h1>
                <h1 style="text-align: center">---STANDART---</h1>
                <ol class="breadcrumb mb-4">
                    <li id="tulisan">Kumpulan Video </li>
                </ol>
                <form action="../controllers/forum.php" method="POST">
                    <button class="btn btn-success" name="forum[<?=$idkategori->id?>]">Forum</button>
                </form>
                <br>
                <!-- <table class="table table-dark table-striped">
                    <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Video</th>
                    </thead>
                    <tbody> -->
                <h2>Subscribe untuk mendapatkan full access</h2><br><br>
                <div class="container px-4">
                    <div class="row gx-5 row row-cols-3">    
                        <?php 
                            foreach($video as $idx => $video){
                                ?>
                                <!-- <tr>
                                    <td><label "> <?= $idx + 1 ?> </label></td>
                                    <td><label ><?= $video->judul ?></label></td>
                                    <td><a  href="../controllers/vid.php?watch=true&idyt=<?=$video->video?>&idv=<?=$video->id?>">Watch</a> </td>
                                </tr> -->
                                <div class="col">
                                    <div class="p-5 border bg-light">
                                        <div class="row row-cols-2">
                                            <div>
                                                <div><?= $video->judul ?></div>
                                                <progress id="pb" value="<?=$min?>" max="<?=$max?>"></progress>
                                                <div><a  href="../controllers/vid.php?watch=true&idyt=<?=$video->video?>&idv=<?=$video->id?>">Watch</a></div>
                                            </div>

                                            <div>tes</div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                    <!-- </tbody>
                </table> -->
                
                

                
                <form action="" method="POST">
                    <button type="submit" class="btn btn-primary" name="btnback" id="kembali">Back</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>