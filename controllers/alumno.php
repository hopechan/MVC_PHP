<?php
    class Alumno extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->alumnos = [];
            //$this->view->alumno = '';
        }

        function index(){
            $alumnos = $this->model->get();
            $this->view->alumnos = $alumnos;
            //$this->view->render('alumno/index');
        }

        function findAll(){
            $alumnos = $this->model->get();
            $items = json_encode($alumnos, JSON_PRETTY_PRINT);
            echo $items;
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
            header('Location:http://localhost/mvcphp/alumno');
        }

        //metodo eliminar
        function delete($dato = null){
            $id = $dato[0];
            $this->model->delete($id);
            $this->index();
        }

        //metodo para obtener un registro
        function getById($dato = null){
            $id = $dato[0];
            $alumno = $this->model->getById($id);
            session_start();
            $_SESSION['id_alumno'] = $alumno->id;
            //renderizando la vista de detalles
            $this->view->alumno = $alumno;
            $this->view->render('alumno/detalle');
        }

        function update(){
            session_start();
            $id = $_SESSION['id_alumno'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            //se destruye la session
            unset($_SESSION['id_alumno']);
            //$this->model->update(['id_Alumno'=> $id,'nombre'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono]);
            $this->model->update(['id'=>$id,'nombre'=>$nombre,'apellido'=>$apellido,'telefono'=>$telefono]);
            $this->index();
            /*
            if ($this->model->update(['id'=> $id,'nombre'=>$nombre, 'apellido'=>$apellidos, 'telefono'=>$telefono])) {
                $alumno = new Alumnos();
                $alumno->nombre = $nombre;
                $alumno->apellido = $apellido;
                $alumno->telefono = $telefono;
                $this->view->alumno = $alumno;
                $this->index();
            }else{
                $this->view->render('errores/index');
            }
            */
        }
    }
?>