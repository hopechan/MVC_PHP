<?php
/**
 * Clase padre para los controladores
 */
    class Controller{
        function __construct() {
            //crear vistas que pertenezcan al controlador invocado
            $this->view = new View(); //variable privada
        }
    }
    
?>