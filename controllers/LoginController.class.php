<?php 
    namespace controllers;
    use views;
    use models;
    
    class LoginController{
        public static function executar(){
            views\View::render('login');
        }
        public static function login($user,$pass){
            $result = models\LoginModel::login($user,$pass);
            if($result != false){
                $_SESSION['login_ChatOnline'] = true;
                $_SESSION['id'] = intval($result);
                self::redirect();
            }
        }
        private static function redirect($url=null){
            header('Location: '.ROOT_PATH.$url);
            die();
        }
    }
?>