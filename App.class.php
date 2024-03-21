<?php 
    class App{
        public static function executar(){
            if(isset($_POST['editUser'])){
                controllers\ChatController::editUser($_POST['nome'],$_POST['sobrenome'],$_FILES['foto'],$_POST['usuario'],$_POST['senha']);
            }
            if(isset($_GET['logout'])){
                controllers\ChatController::logout();
            }
            if(isset($_POST['registro'])){
                controllers\RegistroController::registrarUsuario($_POST['nome'],$_POST['sobrenome'],$_POST['usuario'],$_POST['senha']);
            }
            if(isset($_POST['login'])){
                controllers\LoginController::login($_POST['usuario'],$_POST['senha']);
            }

            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url'])[0];
                $url = 'controllers\\'.ucfirst($url).'Controller';
                $url::executar();
            }else{
                if(isset($_SESSION['login_ChatOnline']))
                    controllers\ChatController::executar();
                else
                    controllers\LoginController::executar();
            }
        }
    }
?>