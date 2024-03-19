<?php 
    session_start();

    function autoload($class){
        $class = str_replace('\\','/',$class);
        include "$class.class.php";
    }
    spl_autoload_register('autoload');

    date_default_timezone_set('America/Sao_Paulo');

    define('HOST','localhost');
    define('BDNAME','chat_online');
    define('USER','root');
    define('PASS','');
?>