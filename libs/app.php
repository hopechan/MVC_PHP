<?php
    //Referencias
    require_once "controllers/errores.php";
    class App{
        function __construct() {
            //obtener la url
            $url = $_GET['url'];
            //echo "<h3>".$url."</h3><br>";
            //elimina caracteres
            $url = rtrim($url, "/");
            //
            $url = explode("/", $url);
            $archivoController = 'controllers/'.$url[0].'.php';
            if (file_exists($archivoController)) {
                require_once $archivoController;//'controllers/main.php'
                /*Objeto de la clase del controlador recibido */
                $controller = new $url[0];
                //Se verifica que si existe el metodo ingresado en la posicion 1 de la URL
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                }
            } else {
                $controller = new Errores();
            }
        }
    }
    
?>