<?php
    session_start();
    set_include_path(__DIR__.'/../');
    spl_autoload_register();

    include_once __DIR__."/database.php";
?>