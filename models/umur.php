<?php
    namespace Models;
    use Config\Database;

    class umur{
        static function getUmur(){
            $db = Database::instance();
            return $db->query("SELECT umur ,COUNT(*) AS jumlah FROM user GROUP BY umur ORDER BY umur")->fetchAll();
        }

        // static function ambilumur(){
        //     $db = Database::instance();
        //     return $db->query("SELECT DISTINCT umur from user")->fetchAll();
        // }
    }
?>