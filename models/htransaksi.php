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
        static function getByidmember($id_member){
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM transaksi WHERE id_member=:id_member ",[
                "id_member"=>$id_member
            ]);
            return $temp->fetchAll();
            
        }
    
        static function getforvalidation(){
            $db=Database::instance();
            $temp=$db->query("SELECT  t.id as id, u.id as id_member,u.nama as nama,t.bukti as bukti FROM transaksi t,user u WHERE t.id_member=u.id and bukti IS NOT NULL");
            return $temp->fetchAll();
        }
        static function deletebyidtransaksi($id){
            $db=Database::instance();
            $db->query("DELETE FROM transaksi WHERE id=:id",[
                "id"=>$id
            ]);
            
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