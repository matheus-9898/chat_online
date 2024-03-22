<?php 
    session_start();

    function autoload($class){
        $class = str_replace('\\','/',$class);
        $fileClass = "$class.class.php";
        if(file_exists($fileClass))
            include $fileClass;
        else{
            die('Erro 404.');
        }
    }
    spl_autoload_register('autoload');

    date_default_timezone_set('America/Sao_Paulo');

    define('ROOT_PATH','https://matheusm.online/chat_online/');

    define('HOST','162.241.2.230');
    define('BDNAME','ondigc37_chat_online');
    define('USER','ondigc37_matheus');
    define('PASS','Stifler.28');
?>