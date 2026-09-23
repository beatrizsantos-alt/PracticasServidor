<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar alumno</title>
</head>

<body>

<h2>Eliminar alumno</h2>

<form method="post" action="eliminar.php">

    Email de Educamos:
    <input type="email" name="email_educamos" required>
    <br><br>

    <input type="submit" value="Eliminar">

</form>

<?php

$conexion = mysqli_connect("localhost", "root", "", "practicaAlumnado");

if (!$conexion) {
    die("Error de conexión");
}

mysqli_set_charset($conexion, "utf8");

if (isset($_POST["email_educamos"])) {

    $email_educamos = $_POST["email_educamos"];

    $sql = "DELETE FROM alumnos
            WHERE email_educamos = '$email_educamos'";

    mysqli_query($conexion, $sql);

    echo "Alumno eliminado correctamente";
}

mysqli_close($conexion);

?>

</body>
</html>
