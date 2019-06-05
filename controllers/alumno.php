<?php
    class Alumno extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->alumnos = [];
        }

        function index(){
            $alumnos = $this->model->get();
            $this->view->alumnos = $alumnos;
            $this->view->render('alumno/index');
        }

        //metodo para nuevo registro
        function nuevo(){
            $this->view->render('alumno/nuevo');

        }

        function insert(){
            # code...
        }

    }
?>