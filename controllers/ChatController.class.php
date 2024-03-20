<?php 
    namespace controllers;
    use views;
    use models;
    
    class ChatController{
        public static function executar(){
            views\View::render('chat',self::getUsers());
        }
        public static function logout(){
            session_destroy();
            self::redirect();
        }
        private static function redirect($url=null){
            header('Location: '.ROOT_PATH.$url);
            die();
        }
        public static function getUsers(){
            return models\ChatModel::getUsers();
        }
    }
?>