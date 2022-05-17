<?php
    require_once "../config/config.php";
    use Models\trans;
    if (isset($_GET["action"])) {
        if ($_GET["action"]=="gettahun") {
            echo json_encode(gettahun());
        } else if ($_GET["action"]=="getbyyear") {
            echo json_encode(getbyyear($_GET["tahun"]));
        }
    }
    function gettahun()
    {
        return trans::getTahun();
    }
    function getbyyear($tahun)
    {
        return trans::getbyyear($tahun);
    }
?>