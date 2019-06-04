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
        <h1 style="color:green">Hola estas en la vista Alumno</h1> 
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/alumno.php';
                    foreach ($this->alumnos as $item) {
                        $alumno = new Alumno();
                        $alumno = $item;
                ?>
                <tr>
                    <td><?php echo $alumno->id;?></td>
                    <td><?php echo $alumno->nombre;?></td>
                    <td><?php echo $alumno->apellido;?></td>
                    <td><?php echo $alumno->telefono;?></td>
                    <td></td>
                </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>