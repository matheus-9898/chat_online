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
    }
?>