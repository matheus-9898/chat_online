<?php 
    namespace views;
    
    class View{
        public static function render($nameFile,$users=null){
            include "pages/$nameFile.php";
        }
    }
?>