<?php
    namespace Models;
    use Config\Database;
    class Video{
        private string $judul,$kategori, $link;
        //Untuk buat object chart. Wajib sebelum tambah chart ke db
        function __construct($judul,$kategori, $link)
        {
            $this->judul=$judul;
            $this->kategori=$kategori;
            $this->link=$link;
        }
        //Tambah chart
        public function addvideo()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO thread(judul, video, status_video, f_kategori) VALUES(:judul, :video, 1, :kategori)",[
                "judul"=>$this->judul,
                "video"=>$this->link,
                "kategori"=>$this->kategori,
            ]);
        }
        //Ambil chart dengan nama
        public static function cekKategori($nama)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM kategori_vid WHERE nama_kategori=:nama",[
                "nama"=>$nama
            ]);
            return $temp->rowCount();
        }

        public static function insertKategori($nama)
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO kategori_vid(nama_kategori) VALUES(:nama)",[
                "nama"=>$nama
            ]);
            return $temp->fetch();
        }
        
        public static function getKategori($nama)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM kategori_vid WHERE nama_kategori=:nama",[
                "nama"=>$nama
            ]);
            return $temp->fetch();
        }

        public static function getIDkategori($id)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT f_kategori FROM thread  WHERE status_video = 1 and id = :id", [
                "id"=>$id
            ]);
            return $temp->fetch();
        }

        public static function getKategoribyId($nama)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT nama_kategori FROM kategori_vid WHERE id=:nama",[
                "nama"=>$nama
            ]);
            return $temp->fetch();
        }

        public static function getKategoribyName($nama)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT id FROM kategori_vid WHERE nama_kategori=:nama",[
                "nama"=>$nama
            ]);
            return $temp->fetch();
        }

        public static function getVideo()
        {
            $db=Database::instance();
            // $temp=$db->query("SELECT t.id, t.judul, t.video, k.nama_kategori FROM  kategori_vid k LEFT JOIN thread t  ON t.f_kategori=k.id AND t.status_video = 1");
            $temp=$db->query("SELECT distinct k.nama_kategori, k.id FROM  kategori_vid k LEFT JOIN thread t ON t.f_kategori=k.id AND t.status_video = 1");
            return $temp->fetchAll();
        }

        public static function jumlahVideo($f)
        {
            $db=Database::instance();
            // $temp=$db->query("SELECT t.id, t.judul, t.video, k.nama_kategori FROM  kategori_vid k LEFT JOIN thread t  ON t.f_kategori=k.id AND t.status_video = 1");
            $temp=$db->query("SELECT count(*) as c FROM  thread WHERE f_kategori = :f AND status_video = 1", [
                "f"=>$f
            ]);
            return $temp->fetch();
        }

        public static function getVideobyKategori($id)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT t.id, t.judul, t.video, k.nama_kategori FROM thread t, kategori_vid k WHERE t.f_kategori=k.id and t.status_video = 1 and t.f_kategori = :kategori",[
                "kategori"=>$id
            ]);
            return $temp->fetchAll();
        }

        public static function getVideobyKategoriLIMIT($id)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT t.id, t.judul, t.video, k.nama_kategori FROM thread t, kategori_vid k WHERE t.f_kategori=k.id and t.status_video = 1 and t.f_kategori = :kategori LIMIT 3",[
                "kategori"=>$id
            ]);
            return $temp->fetchAll();
        }

        //    PROGRESS BAR
        public static function insertPB($refuser, $refkategori, $refthread)
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO progressbar(refuser, refkategori, refthread) VALUES(:refuser, :refkategori, :refthread)",[
                "refuser"=>$refuser,
                "refkategori"=>$refkategori,
                "refthread"=>$refthread,
            ]);
            return $temp->fetch();
        }

        public static function cekPB($refuser, $refkategori, $refthread)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT count(*) as c FROM progressbar WHERE refuser = :refuser AND refkategori = :refkategori AND refthread = :refthread",[
                "refuser"=>$refuser,
                "refkategori"=>$refkategori,
                "refthread"=>$refthread,
            ]);
            return $temp->fetch();
        }

        public static function VideoWatchedPB($refuser, $refkategori)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT count(*) as c FROM progressbar WHERE refuser = :refuser AND refkategori = :refkategori",[
                "refuser"=>$refuser,
                "refkategori"=>$refkategori,
            ]);
            return $temp->fetch();
        }
    }
?>