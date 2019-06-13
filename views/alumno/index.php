    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Principal</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <div id="main">
        <h4>Listado de alumnos</h4>
        <br>
        <a href="<?php constant('URL')?>alumno/nuevo">Nuevo Alumno</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="tabla-estudiantes">
                <?php
                    include_once 'models/alumnos.php';
                    foreach ($this->alumnos as $item) {
                        $alumno = new Alumnos();
                        $alumno = $item;
                ?>
                <tr id="fila-<?php echo $alumno->id?>">
                    <td><?php echo $alumno->id;?></td>
                    <td><?php echo $alumno->nombre;?></td>
                    <td><?php echo $alumno->apellido?></td>
                    <td><?php echo $alumno->telefono;?></td>
                    <td>
                        <a class="waves-effect waves-light btn-small" id="btnEditar" data-id="<?php echo $alumno->id?>">Editar</a>
                        <a class="waves-effect waves-light btn-small" id="btnEliminar" data-id="<?php echo $alumno->id?>">Eliminar</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <br><br>
        <form action="" id="frmEditar" hidden>
            <h4>Editar Alumno</h4>
            <table>
                <input type="hidden" name="nombre" id="idAlumno" value="" required>
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" name="nombre" id="nombre" value="" required></td>
                </tr>
                <tr>
                    <td><label for="apellido">Apellido</label></td>
                    <td><input type="text" name="apellido" id="apellido" required value=""></td>
                </tr>
                <tr>
                    <td><label for="telefono">Telefono</label></td>
                    <td><input type="text" name="telefono" id="telefono" required value=""></td>
                </tr>
                <tr>
                    <td><a class="waves-effect waves-light btn" id="btnGuardar">Guardar</a></td>
                    <td><a href="<?php echo constant('URL');?>alumno">Cancelar</a></td>
                </tr>
            </table>
        </form>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>