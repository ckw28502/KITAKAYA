<?php 

namespace Models;

use Config\Database;

// Model adalah file/class/function/apapun itu yang bertanggung jawab 
// dalam pengolahan data (tidak harus databse, bisa file storage, session, dll)
// Khusus tutor ini, hanya berhubungan dengan database saja

class User {
    private string $nama;
    private string $email;
    private string $password;
    private string $umur;
    private $role;
    private $status;

    function __construct($nama,$email,$password,$umur)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->password = $password;
        $this->umur = $umur;
        $this->role = 0;
        $this->status = 0;
    }

    static function getByUsername($email){
        $db = Database::instance();
        return $db->query("SELECT * FROM user WHERE email = :email",
        [
            "email"=>$email
        ])->fetch();
    }
    static function updateexpdate($id,$expired){
        $db = Database::instance();
        $db->query("UPDATE user SET expired =:expired WHERE id =:id",
        [
            
            "expired"=>$expired,
            "id"=>$id

        ]);
    }
    static function getStatus($email, $status){
        $db = Database::instance();
        return $db->query("SELECT * FROM user WHERE email = :email and status = :status",
        [
            "email"=>$email,
            "status"=>$status
        ])->fetch();
    }

    static function getRole($email, $role){
        $db = Database::instance();
        return $db->query("SELECT * FROM user WHERE email = :email and role = :role",
        [
            "email"=>$email,
            "role"=>$role
        ])->fetch();
    }

    static function getAll(){
        $db = Database::instance();
        return $db->query("SELECT * FROM user")->fetchAll();
    }

    static function updaterole($id,$role){
        $db = Database::instance();
        return $db->query("UPDATE user SET role = :role WHERE id = :id",
        [
            "id"=>$id,
            "role"=>$role
        ])->fetch();
    }
    function save(){
        $db = Database::instance();
        $cekemail = self::getByUsername($this->email);
        if($cekemail){
            
        }
        else{
            $db->query("INSERT INTO user(email,password,nama,umur,role,status) values(:email,:password,:nama,:umur,:rolee,:statuss)",[
                "nama"=> $this->nama,
                "email"=> $this->email,
                "password"=>$this->password,
                "umur"=>$this->umur,
                "rolee"=>0,
                "statuss" => 0
            ]);
        }
        return $this;
    }
}

?>