<?php
    class AlumnoModel extends Model{
        public function __construct(Type $var = null) {
            parent::__construct();
        }

        //metodo que permite hacer un insert
        function insert(){
            echo "En teoria este metodo funciona porque se aplico MVC :v";
        }

        //metodo que permitira obtener registros de la base de datos
        function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT * FROM Alumno");
                while ($row = $query->fetch()) {
                    $item = new Alumno();
                    $item->id = $row['id_Alumno'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];
                    $item->telefono = $row['telefono'];
                    array_push($items, $item);
                }
                return $items;
            } catch(PDOException $e){
                return [];
            }
        }
    }
?>