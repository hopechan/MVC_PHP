<?php
    include_once 'models/alumnos.php';
    class AlumnoModel extends Model{
        public function __construct() {
            parent::__construct();
        }
 
        //metodo que permite hacer un insert
        function insert($data){
            try {
                $sql = "INSERT INTO Alumno(nombre, apellido, telefono) VALUES(:nombre, :apellido, :telefono)";
                $query = $this->db->conn()->prepare($sql);
                $query->execute(['nombre'=>$data['nombre'], 'apellido'=>$data['apellido'], 'telefono'=>$data['telefono']]);
                return true;
                /*$query->bindParam(':nombre', $data['nombre']);
                $query->bindParam(':apellido', $data['apellido']);
                $query->bindParam(':telefono', $data['telefono']);*/
            } catch (PDOException $e) {
                return false;
            }
        }

        //metodo que permitira obtener registros de la base de datos
        function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT * FROM Alumno");
                while ($row = $query->fetch()) {
                    //se crea objeto de la clase Alumnos
                    $item = new Alumnos();
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

        //metodo delete 
        function delete($id){
            try {
                $sql = "DELETE FROM Alumno WHERE id_Alumno = :id";
                $query = $this->db->conn()->prepare($sql);
                $query->execute(['id'=>$id]);
                return true;
                /*$query->bindParam(':nombre', $data['nombre']);
                $query->bindParam(':apellido', $data['apellido']);
                $query->bindParam(':telefono', $data['telefono']);*/
            } catch (PDOException $e) {
                return false;
            }
        }

        function getById($id){
            $item = new Alumnos();
            $sql = "SELECT * FROM Alumno WHERE id_Alumno = :id";
            $query=$this->db->conn()->prepare($sql);
            try {
                $query->execute(['id'=>$id]);
                while ($row = $query->fetch()) {
                    $item->id = $row['id_Alumno'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];
                    $item->telefono = $row['telefono'];
                    //array_push($items, $item);
                }
                return $item;
            } catch(PDOException $e){
                return [];
            }
        }

        //metodo para editar un registrp
        function update($item){
            $sql = "UPDATE ALUMNO SET nombre = :nombre, apellido = :apellido, telefono = :telefono WHERE id_Alumno = :id";
            $query=$this->db->conn()->prepare($sql);
            try {
                $query->execute(['id'=>$item['id'], 
                                'nombre' => $item['nombre'],
                                'apellido' =>$item['apellido'],
                                'telefono' =>$item['telefono']    
                            ]);
                return true;
            } catch(PDOException $e){
                return false;
            }
        }
    }
?>