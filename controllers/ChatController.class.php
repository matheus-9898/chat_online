<?php 
    namespace controllers;
    use views;
    use models;
    
    class ChatController{
        public static function executar(){
            views\View::render('chat');
        }
    }
?>