<?php
    namespace Models;
    use Config\Database;
    class chat{
        private int $service;
        private string $isi;
        private string $tanggal;
        private int $pengirim;


        //Untuk buat object service. Wajib sebelum tambah service ke db
        function __construct($service,$isi,$tanggal,$pengirim)
        {
            $this->service=$service;
            $this->isi=$isi;
            $this->tanggal=$tanggal;
            $this->pengirim=$pengirim;
        }
        //Tambah service
        public function addchat()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO chat(service,isi,tanggal,pengirim) VALUES(:service,:isi,:tanggal,:pengirim)",[
                "service"=>$this->service,
                "isi"=>$this->isi,
                "tanggal"=>$this->tanggal,
                "pengirim"=>$this->pengirim
            ]);
        }
        //Ambil service dengan nama
        public static function getbyidservice($service)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM chat WHERE service=:service",[
                "service"=>$service
            ]);
            return $temp->fetchAll();
        }

    }
?>