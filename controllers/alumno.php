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
            //Declarar variables para recibir los datos del formulario nuevo
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellido'];
            $telfono = $_POST['telefono'];
            $this->model->insert(['nombre'=>$nombre, 'apellido'=>$apellidos, 'telefono'=>$telfono]);
        }

    }
?>