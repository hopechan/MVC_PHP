<?php
    class Main  extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
            echo "Soy el controlador main";
        }
        /*
            metodo de prueba
             URL = /mvcphp/main/saludo
        */
        function saludo(){
            echo "<br>YARE YARE DAZE";
        }

        /*
            metodo de prueba x2
            URL = /mvcphp/main/hola
        */
        function hola(){
            echo "<h2>MUDA MUDA MUDA</h2>";
        }
    }
    
?>