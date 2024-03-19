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

    define('ROOT_PATH','http://localhost/projetos/chat_online/');

    define('HOST','localhost');
    define('BDNAME','chat_online');
    define('USER','root');
    define('PASS','');
?>