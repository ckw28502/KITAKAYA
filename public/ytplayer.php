<?php
require_once "../config/config.php";
    $id = $_SESSION['yt'];

    $user = $_SESSION["user"];
    $role = $user->role;
    if (isset($_POST['btnback'])) {
        if ($role == 0) {
            header("Location: showvideo_userbiasa.php");
        }else if ($role == 1){
            header("Location: showvideo_uservip.php");
        }
        
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
    <title>Youtube</title>
</head>
<body>
    <object width="100%" height="800px" data="http://www.youtube.com/v/<?=$id?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?=$video->video?>" /></object>
    <form action="" method="POST">
        <button type="submit" class="btn btn-primary" name="btnback" id="kembali">Back</button>
    </form>
</body>
</html>