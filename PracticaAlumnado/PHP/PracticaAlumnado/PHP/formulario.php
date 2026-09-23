<html>
<head>
    <meta charset="UTF-8">
    <title>Información</title>
</head>

<body>


<?php

$conexion = mysqli_connect("localhost", "root", "", "practicaAlumnado");

if (!$conexion) {
    die("Error de conexión");
}

mysqli_set_charset($conexion, "utf8");

if (isset($_POST["nombre"])) {

    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $curso = $_POST["curso"];
    $email_educamos = $_POST["email_educamos"];
    $contrasena_educamos = $_POST["contrasena_educamos"];

    $sql = "SELECT * FROM alumnos WHERE curso = '$curso'";

    $resultado = mysqli_query($conexion, $sql);

    $numero_alumnos = mysqli_num_rows($resultado);

    if ($numero_alumnos < 25) {

        $sql = "INSERT INTO alumnos
        (nombre, apellido1, apellido2, fecha_nacimiento, curso, email_educamos, contrasena_educamos)
        VALUES
        ('$nombre', '$apellido1', '$apellido2', '$fecha_nacimiento', '$curso', '$email_educamos', '$contrasena_educamos')";

        mysqli_query($conexion, $sql);

        echo "Alumno/a matriculado correctamente";

    } else {

        echo "No se puede matricular. El curso ya tiene 25 alumnos.";

    }
}

mysqli_close($conexion);

?>

<a href="formulario.php">Añadir alumno</a>
<br>
<a href="modificar.php">Modificar alumno</a>
<br>
<a href="eliminar.php">Eliminar alumno</a>

</body>
</html>
