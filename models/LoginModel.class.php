<?php 
    namespace models;
    use PDO;

    class LoginModel{
        public static function login($user,$pass){
            $sql = MysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios WHERE usuario=? AND senha=?');
            $sql->execute(array($user,$pass));
            if($sql->rowCount() == 1){
                $info = $sql->fetch(PDO::FETCH_ASSOC);
                return $info;
            }else
                return false;
        }
    }
?>