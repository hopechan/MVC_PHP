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
                //obteniendo la cantidad de parametros de la url en el indice 2
                // ---->>>url/controlador/metodos/parametros
                //Se verifica que si existe el metodo ingresado en la posicion 1 de la URL
                $nparam = sizeof($url);
                if ($nparam > 1) {
                    if ($nparam>2) {
                        $param = [];
                        for ($i=2; $i < $nparam; $i++) { 
                            array_push($param, $url[$i]);
                        }
                        //llamando el metodo recibido con sus parametros
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->index();
                }
            }else {
                $controller = new Errores();
            }
        }
    }
    
?>