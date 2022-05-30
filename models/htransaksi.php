<?php
    namespace Models;

    use Config\Database;

    class htransaksi{
        private $id_member;
        private $subtotal;
        private $bukti;
        private $status;
        private $tgl;
        private $bulan;

        function __construct($id_member,$subtotal,$bukti,$tgl,$bulan)
        {
            $this->id_member = $id_member;
            $this->subtotal = $subtotal;
            $this->bukti = $bukti;
            $this->status =0;
            $this->tgl =$tgl;
            $this->bulan =$bulan;
        }

        static function getAll(){
            $db = Database::instance();
            return $db->query("SELECT * FROM transaksi")->fetchAll();
        }
        static function getByidmember($id_member){
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM transaksi WHERE id_member=:id_member and status=0",[
                "id_member"=>$id_member
            ]);
            return $temp->fetchAll();
            
        }

        static function getforvalidation(){
            $db=Database::instance();
            $temp=$db->query("SELECT  t.id as id, u.id as id_member,u.nama as nama,t.bukti as bukti,t.tgl as tgl,t.status as status FROM transaksi t,user u WHERE t.id_member=u.id and bukti IS NOT NULL");
            return $temp->fetchAll();
        }
        static function getforhistorymember($id_member){
            $db=Database::instance();
            $temp=$db->query("SELECT  t.id as id, u.id as id_member,u.nama as nama,t.bukti as bukti,t.tgl as tgl,t.status as status FROM transaksi t,user u WHERE t.id_member=u.id and u.id=:id_member and bukti IS NOT NULL",[
                "id_member"=>$id_member
            ]);
            return $temp->fetchAll();
        }
        static function getforhistoryadmin($nama){
            $db=Database::instance();
            $temp=$db->query("SELECT t.id as id, u.id as id_member,u.nama as nama,t.bukti as bukti,t.tgl as tgl,t.status as status FROM transaksi t,user u WHERE t.id_member=u.id and t.status<>0 and bukti IS NOT NULL AND u.nama LIKE CONCAT('%',:nama,'%') ORDER BY t.tgl DESC",[
                "nama"=>$nama
            ]
            );
            return $temp->fetchAll();
        }
        static function acceptbyidtransaksi($id){
            $db=Database::instance();
            $db->query("UPDATE transaksi SET status =1 WHERE id = :id",[
                "id"=>$id
            ]);           
        }
        static function rejectbyidtransaksi($id){
            $db=Database::instance();
            $db->query("UPDATE transaksi SET status =-1 WHERE id = :id",[
                "id"=>$id
            ]);           
        }
        static function getbulan($id)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT bulan FROM transaksi WHERE id = :id",[
                "id"=>$id
            ]);
            return $temp->fetch();
        }
        function save(){
            
            $db = Database::instance();
            $db->query("INSERT INTO transaksi(id_member,subtotal,bukti,tgl,bulan,status) values(:id_member,:subtotal,:bukti,:tgl,:bulan,:status)",[
                "id_member"=> $this->id_member,
                "subtotal"=> $this->subtotal,               
                "bukti"=>$this->bukti,
                "tgl"=>$this->tgl,
                "bulan"=>$this->bulan,
                "status"=> $this->status                        
            ]);
        }
    }
?>