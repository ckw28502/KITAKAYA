<?php
    namespace Models;
    use Config\Database;

    class trans{
        static function getTahun()
        {
            $db=Database::instance();
            return $db->query("SELECT DISTINCT YEAR(tgl) AS tahun FROM transaksi ORDER BY YEAR(tgl) DESC")->fetchAll();
        }
        static function getbyyear($tahun)
        {
            $db=Database::instance();
            return $db->query("SELECT MONTH(tgl) AS bulan, COUNT(*) AS qty FROM transaksi WHERE YEAR(tgl)=:tahun GROUP BY MONTH(tgl) ORDER BY MONTH(tgl)",["tahun"=>$tahun])->fetchAll();
        }
    }
?>