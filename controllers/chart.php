<?php
    require_once "../config/config.php";
    use Models\chart;
    use Utils\Message;
    use Utils\Validation;
    //Untuk tambah chart
    function addchart($nama,$keterangan)
    {
        $chart=new chart($nama,$keterangan);
        $chart->addchart();
    }
    function getall()
    {
        return chart::getAll();
    }
    function getmax()
    {
        return chart::getMax();
    }
    if (isset($_GET["action"])) {
        if ($_GET["action"]=="getmax") {
            echo json_encode(getmax()->id);
        } else if ($_GET["action"]=="getall") {
            $temp=getall();
            echo json_encode($temp);
        }
    }
    if (isset($_POST["action"])) {
        if ($_POST["action"]=="addchart") {
            $nama=$_POST["nama"];
            $keterangan=$_POST["keterangan"];
            $cek=Validation::empty($nama,$keterangan);
            //pengecekan
            if ($nama==""||$keterangan=="") {
                Message::add("Inputan Kosong", "Inputan harus terisi semua!");
                echo json_encode(Message::print("Inputan Kosong"));
            } else if (!chart::getbyname($nama)) {
                addchart($nama,$keterangan);
                Message::add("Success", "Berhasil tambah watchlist!");
                echo json_encode(Message::print("Success"));
            } else {
                Message::add("Nama Kembar","Nama ini sudah dipakai!");
                echo json_encode(Message::print("Nama Kembar"));
            }
        }
    }
?>