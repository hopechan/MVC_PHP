<?php
    //Referencias
    require_once "controllers/errores.php";
    class App{
        function __construct() {
            //obtener la url
            $url = isset($_GET['url'])?$_GET['url']:null;
            //elimina caracteres
            $url = rtrim($url, "/");
            //
            $url = explode("/", $url);
            //validar que en el indice 0 de la url exista un controlador
            if (empty($url[0])) {
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                //el modelo main
                $controller->loadModel('main');
                $controller->index();
                return false;
            }
            $archivoController = 'controllers/'.$url[0].'.php';
            if (file_exists($archivoController)) {
                require_once $archivoController;//'controllers/main.php'
                /*Objeto de la clase del controlador recibido */
                $controller = new $url[0];
                $controller->loadModel($url[0]);
                //Se verifica que si existe el metodo ingresado en la posicion 1 de la URL
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                }else{
                    $controller->index();
                }
            } else {
                $controller = new Errores();
            }
        }
    }
    
?>