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
            header('Location:http://localhost/mvcphp/alumno');
        }

        //metodo eliminar
        function delete($dato = null){
            $id = $dato[0];
            if ($this->model->delete($id)) {
                $mensaje ="Alumno eliminado correctamente";
            } else {
                $mensaje = "No se pudo eliminar al alumno";
            }
            echo $mensaje;
        }

        //metodo para obtener un registro
        function getById($dato = null){
            $id = $dato[0];
            $alumno = $this->model->getById($id);
            $item = json_encode($alumno, JSON_PRETTY_PRINT);
            session_start();
            $_SESSION['id_alumno'] = $alumno->id;
            echo $item;
            //renderizando la vista de detalles
            //$this->view->alumno = $item;
            //$this->view->render('alumno/index');
        }

        function update(){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            //$this->model->update(['id_Alumno'=> $id,'nombre'=>$nombre, 'apellido'=>$apellido, 'telefono'=>$telefono]);
            $this->model->update(['id'=>$id,'nombre'=>$nombre,'apellido'=>$apellido,'telefono'=>$telefono]);
            $this->index();
        }
    }
?>