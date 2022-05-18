<?php
    require_once "../config/config.php";
    use Models\umur;
    
    if (isset($_GET["action"])) {
        if ($_GET["action"]=="getumur") {
            echo json_encode(getumur());
        }
    }

    function getumur()
    {
        return umur::getUmur();
    }
?>