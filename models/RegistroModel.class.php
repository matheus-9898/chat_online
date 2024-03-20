<?php 
    namespace models;

    class RegistroModel{
        private static function verifNomeUser($user){
            $sql = MysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios WHERE usuario=?');
            $sql->execute(array($user));
            if($sql->rowCount() == 0)
                return true;
            else
                return false;
        }
        public static function registrarUsuario($name,$lastName,$user,$pass){
            if(trim($name) != '' && trim($user) != '' && trim($pass) != ''){
                if(self::verifNomeUser($user)){
                    $sql = MysqlModel::conexaoBD()->prepare('INSERT INTO usuarios VALUES (?,?,?,?,?)');
                    $sql->execute(array(null,$name,$lastName,$user,$pass));
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }
?>