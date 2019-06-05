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
            <tbody>
                <?php
                    include_once 'models/alumnos.php';
                    foreach ($this->alumnos as $item) {
                        $alumno = new Alumnos();
                        $alumno = $item;
                ?>
                <tr>
                    <td><?php echo $alumno->id;?></td>
                    <td><?php echo $alumno->nombre;?></td>
                    <td><?php echo $alumno->apellido?></td>
                    <td><?php echo $alumno->telefono;?></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>