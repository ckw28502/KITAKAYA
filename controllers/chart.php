<?php
    require_once "../config/config.php";
    use Models\chart;
    use Utils\Message;
    //Untuk tambah chart
    function addchart($nama,$keterangan)
    {
        //cek ada yang kembar
        if (!chart::getbyname($nama)) {
            $chart=new chart($nama,$keterangan);
            $chart->addchart();
        } else {
            Message::add("Nama kembar","Nama ini sudah dipakai!");
        }
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
            $arr=array();
            foreach ($temp as $k => $v) {
                array_push($arr,$v->name);
            }
            echo json_encode($arr)."\n";
        }
    }
    if (isset($_POST["action"])) {
        if ($_POST["action"]=="addchart") {
            $nama=$_POST["nama"];
            $keterangan=$_POST["keterangan"];
            addchart($nama,$keterangan);
        }
    }
?>