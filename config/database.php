<?php
    namespace Config;

    use PDO;
    use PDOException;

    define("DB_HOST","localhost");
    define("DB_USER","root");
    define("DB_PASSWORD","");
    // ganti database name e tergantung nanti
    define("DB_NAME","proyek_aplin");

    class Database{
        private static $instance;
        public $pdo;

        private function __construct()
        {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // menentukan bila terjadi error bagaimana menampilkannya
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // menentukan fetch mode
                PDO::ATTR_EMULATE_PREPARES => false // di turn off supaya menggunakan native prepared statements
            ];

            try {
                $this->pdo = new PDO($dsn,DB_USER,DB_PASSWORD,$options);
            }
            catch(PDOException $e){
                echo  $e->getMessage();
            }
        }

        // Jika belum ada instance nya, buat instance baru.
        // Jika sudah ada, maka return kan instance tsb
        static function instance(){
            if(!isset(self::$instance)){
                self::$instance = new Database();
            }
            return self::$instance;
        }

        function query($sql,$args = NULL){
            if (!$args){
                return $this->pdo->query($sql);
            }
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }
    }
?>