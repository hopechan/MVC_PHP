<?php
/**
 * Clase padre para los controladores
 */
    class View{
        function __construct() {
            echo "<h1>Prueba de las vistas que pertenezcan a cada controlador en su momento</h1>";
        }

        function render($nombre){
            require_once "views/".$nombre.'.php';
            /**
             * por ej: si la variable $nombre = index.php se formaria la 
             * ubicacion ------>view/index.php
             */
        }
    }
    
?>