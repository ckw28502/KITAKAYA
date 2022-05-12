<?php
    namespace Models;
    use Config\Database;
    class chart{
        private string $nama,$keterangan;
        //Untuk buat object chart. Wajib sebelum tambah chart ke db
        function __construct($nama,$keterangan)
        {
            $this->nama=$nama;
            $this->keterangan=$keterangan;
        }
        //Tambah chart
        public function addchart()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO rekomendasi(name,keterangan) VALUES(:nama,:keterangan)",[
                "nama"=>$this->nama,
                "keterangan"=>$this->keterangan
            ]);
        }
        //Ambil chart dengan nama
        public static function getbyname($nama)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM rekomendasi WHERE name=:nama",[
                "nama"=>$nama
            ]);
            return $temp->fetch();
        }
        //Ambil semua chart
        public static function getAll()
        {
            $db=Database::instance();
            $temp=$db->query("SELECT name FROM rekomendasi");
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