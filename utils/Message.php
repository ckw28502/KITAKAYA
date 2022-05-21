<?php 

namespace Utils;

class Message{
    static function print(string $key, string $sep = ", "){
        if (isset($_SESSION[$key])){
            $messages = $_SESSION[$key];
            $_SESSION[$key] = [];
            $msg = implode($sep,$messages);
            if ($msg!="") {
                echo "
                    <div class='modal' tabindex='-1' id='alert'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>$key</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <p>$msg</p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var modal=new bootstrap.Modal(document.getElementById('alert'));
                        modal.toggle();
                    </script>";
            }
        }
    }

    static function add(string $key,string $message){
        $_SESSION[$key][] = $message;
    }
}

?>