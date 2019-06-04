<?php
    class Alumno extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->alumnos = [];
        }

        function render(){
            $alumnos = $this->model->get();
            $this->view->alumnos = $alumnos;
            $this->view->render('alumno/index');
        }
    }
?>