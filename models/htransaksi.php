<?php
    namespace Models;

    use Config\Database;

    class htransaksi{
        private $id_member;
        private $bulan;
        private $subtotal;
        private $bukti;


        function __construct($id_member,$subtotal,$bukti)
        {
            $this->id_member = $id_member;
            $this->subtotal = $subtotal;
            $this->bukti = $bukti;
        }

        static function getAll(){
            $db = Database::instance();
            return $db->query("SELECT * FROM transaksi")->fetchAll();
        }

        function save(){
            $db = Database::instance();
            $db->query("INSERT INTO transaksi(id_member,subtotal,bukti) values(:id_member,:subtotal,:bukti)",[
                "id_member"=> $this->id_member,
                "subtotal"=> $this->subtotal,
                "bukti"=>$this->bukti         
            ]);
        }
    }
?>