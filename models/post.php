<?php
    namespace Models;
    use Config\Database;
    class post{
        private string $judul;
        private string $isi;
        private string $namamember;
        private string $tanggal;
        private int $kategori;
       


        //Untuk buat object post. Wajib sebelum tambah post ke db
        function __construct($judul,$isi,$namamember,$tanggal,$kategori)
        {
            $this->judul=$judul;
            $this->isi=$isi;
            $this->namamember=$namamember;
            $this->tanggal=$tanggal;
            $this->kategori=$kategori;
        }
        //Tambah post
        public function addpost()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO thread_forum(judul,isi,namamember,tanggal,kategori) VALUES(:judul,:isi,:namamember,:tanggal,:kategori)",[
                "judul"=>$this->judul,
                "isi"=>$this->isi,               
                "namamember"=>$this->namamember,
                "tanggal"=>$this->tanggal,
                "kategori"=>$this->kategori
            ]);
        }
        //Ambil post dengan kategori
        public static function getbyidkategori($kategori)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM thread_forum WHERE kategori=:kategori",[
                "kategori"=>$kategori
            ]);
            return $temp->fetchAll();
        }

    }
?>