<?php
/**
 * Clase padre para los controladores
 */
    class Controller{
        function __construct() {
            //crear vistas que pertenezcan al controlador invocado
            $this->view = new View(); //variable privada
        }

        function loadModel($model){
            /**
             * Creado direccion del modelo
             * URL que se forma
             * //model/alumnomodel.php
            */
            $url = 'models/'.$model.'model.php';
            //validando que el modelo exista
            if (file_exists($url)) {
                //si existe se llama 
                require $url;
                $modelName = $model.'Model';
                //instancia de la clase del modelo recibido
                $this->model = new $modelName;
            }
        }
    }
    
?>