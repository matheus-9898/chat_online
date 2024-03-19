<?php 
    namespace views;
    
    class View{
        public static function render($nameFile){
            include "pages/$nameFile.php";
        }
    }
?>