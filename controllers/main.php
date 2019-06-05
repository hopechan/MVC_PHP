<?php
    class Main  extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
        }

        function index(){
            $this->view->render('main/index');
        }
    }
?>