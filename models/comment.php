<?php
    namespace Models;
    use Config\Database;
    class comment{
        private int $thread;
        private string $namamember;
        private string $isi;
        private string $tanggal;
        private int $reply;
       


        //Untuk buat object comment. Wajib sebelum tambah comment ke db
        function __construct($thread,$namamember,$isi,$tanggal,$reply)
        {
            $this->thread=$thread;
            $this->namamember=$namamember;
            $this->isi=$isi;
            $this->tanggal=$tanggal;
            $this->reply=$reply;
        }
        //Tambah comment
        public function addcomment()
        {
            $db=Database::instance();
            $temp=$db->query("INSERT INTO comment(thread,namamember,isi,tanggal,reply) VALUES(:thread,:namamember,:isi,:tanggal,:reply)",[
                "thread"=>$this->thread,
                "namamember"=>$this->namamember,
                "isi"=>$this->isi,
                "tanggal"=>$this->tanggal,
                "reply"=>$this->reply
            ]);
        }
        //Ambil comment dengan reply
        public static function getbyidcomment($thread)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM comment WHERE thread=:thread and reply=:reply",[
                "thread"=>$thread,
                "reply"=>-1
            ]);
            return $temp->fetchAll();
        }
        public static function getbyidreply($thread,$reply)
        {
            $db=Database::instance();
            $temp=$db->query("SELECT * FROM comment WHERE thread=:thread and reply=:reply",[
                "thread"=>$thread,
                "reply"=>$reply
            ]);
            return $temp->fetchAll();
        }

    }
?>