<?php
    namespace Models;
    use Config\Database;
    class service{
        private string $judul;
        private int $member;

        //Untuk buat object service. Wajib sebelum tambah service ke db
        function __construct($judul,$member)
        {
            $this->judul=$judul;
            $this->member=$member;

        }
        //Tambah service
        public function addservice()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO service(judul,member) VALUES(:judul,:member)",[
                "judul"=>$this->judul,
                "member"=>$this->member
            ]);
        }
         //update rate service
        public static function rate($rate,$id)
        {
        $db = Database::instance();
        $db->query("UPDATE service SET rate = :rate WHERE id = :id",
        [
            "rate"=>$rate,
            "id"=>$id
        ]);
        }
        //Ambil service dengan nama
        public static function getbyidmember($member)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM service WHERE member=:member",[
                "member"=>$member
            ]);
            return $temp->fetchAll();
        }
        //Ambil semua service
        public static function getAll()
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM service");
            return $temp->fetchAll();
        }
        //Ambil id terbesar
        public static function getMax()
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM rekomendasi WHERE id=(SELECT MAX(id) FROM rekomendasi)");
            return $temp->fetch();
        }
    }
?>