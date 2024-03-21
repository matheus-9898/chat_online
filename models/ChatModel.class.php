<?php 
    namespace models;
    use PDO;

    class ChatModel{
        public static function getUsers(){
            $sql = MysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        }
        public static function editUser($nome,$sobrenome,$foto,$usuario,$senha){
            if($foto != ''){
                $nomeFoto = 'foto-'.$_SESSION['usuario'];

                $dirFoto = 'views/images/perfil/'.$nomeFoto;
                if(file_exists($dirFoto.'.jpeg'))
                    unlink($dirFoto.'.jpeg');
                else if(file_exists($dirFoto.'.jpg'))
                    unlink($dirFoto.'.jpg');
                else if(file_exists($dirFoto.'.png'))
                    unlink($dirFoto.'.png');
                
                $type = explode('/',$foto['type'])[1];
                $nomeFoto .= '.'.$type;
                move_uploaded_file($foto['tmp_name'],'views/images/perfil/'.$nomeFoto);
            }else{
                $nomeFoto = $_SESSION['foto'];
            }

            $sql = MysqlModel::conexaoBD()->prepare('UPDATE usuarios SET nome=?,sobrenome=?,foto=?,usuario=?,senha=?  WHERE id=?');
            $sql->execute(array($nome,$sobrenome,$nomeFoto,$usuario,$senha,$_SESSION['id']));

            return array($nome,$sobrenome,$nomeFoto,$usuario,$senha);
        }
        public static function loadChat($idUser){
            $sql = MysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios WHERE id=?');
            $sql->execute(array($idUser));
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            $data['dadosUser'] = $info;
            die(json_encode($data));
        }
    }
?>