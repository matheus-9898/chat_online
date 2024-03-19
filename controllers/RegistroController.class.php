<?php 
    namespace controllers;
    use views;
    use models;

    class RegistroController{
        public static function executar(){
            views\View::render('registro');
        }
        public static function registrarUsuario($name,$user,$pass){
            if(models\RegistroModel::registrarUsuario($name,$user,$pass))
                self::redirect();
            else
                self::redirect('registro');
        }
        private static function redirect($url=null){
            header('Location: '.ROOT_PATH.$url);
            die();
        }
    }
?>