<?php 

namespace Utils;


class ValidationState{
    public bool $status;
    public string $message;

    function __construct($status,$message = "")
    {
        $this->status = $status;
        $this->message = $message;
    }
}

class Validation{
    static $mode = "POST";

    static function setMode($mode){
        self::$mode = $mode;
    }

    // ... di ...$keys namanya adalah variadic
    // Fungsi nya, agar function bisa memiliki banyak parameter
    static function empty(...$keys){
        $allFields = [];
        if(self::$mode == "POST"){
            $allFields = $_POST;
        }
        else if(self::$mode == "GET"){
            $allFields = $_GET;
        }
        else {
            $allFields = $_GET + $_POST;
        }
        $empty = false;

        foreach($keys as $key){
            if(!isset($allFields[$key]) || $allFields[$key] == ""){
                $empty = true;
                break;
            }
        }

        if($empty) return new ValidationState(false,"Field Empty");
        else return new ValidationState(true);
    }
}

?>