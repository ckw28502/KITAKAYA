<?php 

namespace Utils;

class Message{
    static function print(string $key, string $sep = ", "){
        if (isset($_SESSION[$key])){
            $messages = $_SESSION[$key];
            $_SESSION[$key] = [];
            echo implode($sep,$messages);
        }
    }

    static function add(string $key,string $message){
        $_SESSION[$key][] = $message;
    }
}

?>