<?php
    require_once "../config/config.php";
    use Models\chart;
    use Utils\Message;
    //Untuk tambah chart
    if (isset($_POST["addchart"])) {
        $nama=$_POST["nama"];
        $keterangan=$_POST["keterangan"];
        //cek yang kosong
        if ($nama==""||$keterangan=="") {
            Message::add("nputan kosong","Inputan ada yang kosong!");
        } else {
            //cek ada yang kembar
            if (!chart::getbyname($nama)) {
                $chart=new chart($nama,$keterangan);
                $chart->addchart();
            } else {
                Message::add("Nama kembar","Nama ini sudah dipakai!");
            }
        }
        header("Location: ../public/halamanaddchart.php");
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
            json_encode(getmax()->id);
        } else if ($_GET["action"]=="getall") {
            $temp=array();
            foreach (getall() as $k => $v) {
                $nama=$v->name;
                array_push($temp,$nama);
            }
            var_dump($temp);
            echo json_encode($temp)."\n";
        }
    }
    
?>