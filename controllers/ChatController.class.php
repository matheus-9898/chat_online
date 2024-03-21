<?php 
    namespace controllers;

use DateTime;
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
        public static function editUser($nome,$sobrenome,$foto,$usuario,$senha){
            if(trim($senha) == ''){
                $senha = $_SESSION['senha'];
            }
            if($foto['error'] == UPLOAD_ERR_NO_FILE){
                $foto = '';
            }
            $result = models\ChatModel::editUser($nome,$sobrenome,$foto,$usuario,$senha);
            if($result != false){
                $_SESSION['nome'] = $result[0];
                $_SESSION['sobrenome'] = $result[1];
                $_SESSION['foto'] = $result[2];
                $_SESSION['usuario'] = $result[3];
                $_SESSION['senha'] = $result[4];
                self::redirect();
            }
        }
        public static function loadChat($idReceptor){
            $dadosPerfilChat = models\ChatModel::loadPerfilChat($idReceptor);
            $dadosMsgChat = models\ChatModel::loadMsgChat();

            foreach ($dadosMsgChat as $value) {
                if($value['emissor_id'] == $_SESSION['id'])
                    $value['controle'] = 'msgEnviada';
                else
                    $value['controle'] = 'msgRecebida';
            }
            
            $data['dadosPerfilChat'] = $dadosPerfilChat;
            $data['dadosMsgChat'] = $dadosMsgChat;
            die(json_encode($data));
        }
        public static function enviarMsg($mensagem,$idReceptor){
            models\ChatModel::enviarMsg($mensagem,date('Y-m-d H:i:s'),$_SESSION['id'],$idReceptor);
        }
    }
?>