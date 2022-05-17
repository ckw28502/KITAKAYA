<?php 

namespace Utils;

use ErrorException;

class File{
    public static $target_path = "uploads/";
    private $file = null;

    // supaya tidak bisa di new
    // sehingga hanya dapat digunakan bila menggunakan perintah get
    private function __construct($file)
    {
        $this->file = $file;
    }

    function getName(){
        return $this->file["name"];
    }

    function getSize(){
        return $this->file["size"];
    }

    function getExtension(){
        return pathinfo($this->getName(), PATHINFO_EXTENSION);
    }

    function move($name){
        move_uploaded_file($this->file["tmp_name"],"../".self::$target_path.$name);
    }

    static function delete($name){
        // unlink = delete file
        unlink("../".$name);
    }

    static function get($name){
        return new File($_FILES[$name]);
        
    }
}

?>