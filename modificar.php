<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar alumno</title>
</head>

<body>

<h2>Modificar alumno</h2>

<form method="post" action="modificar.php">

    Email actual:
    <input type="email" name="email_actual" required>
    <br><br>

    Nombre:
    <input type="text" name="nombre" required>
    <br><br>

    Primer apellido:
    <input type="text" name="apellido1" required>
    <br><br>

    Segundo apellido:
    <input type="text" name="apellido2" required>
    <br><br>

    Fecha de nacimiento:
    <input type="date" name="fecha_nacimiento" required>
    <br><br>

    Curso:
    <select name="curso" required>
        <option value="1">1º ESO</option>
        <option value="2">2º ESO</option>
        <option value="3">3º ESO</option>
        <option value="4">4º ESO</option>
    </select>
    <br><br>

    Nuevo email de Educamos:
    <input type="email" name="email_educamos" required>
    <br><br>

    Contraseña de Educamos:
    <input type="password" name="contrasena_educamos" required>
    <br><br>

    <input type="submit" value="Modificar">

</form>

<?php

$conexion = mysqli_connect("localhost", "root", "", "practicaAlumnado");

if (!$conexion) {
    die("Error de conexión");
}

mysqli_set_charset($conexion, "utf8");

if (isset($_POST["email_actual"])) {

    $email_actual = $_POST["email_actual"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $curso = $_POST["curso"];
    $email_educamos = $_POST["email_educamos"];
    $contrasena_educamos = $_POST["contrasena_educamos"];

    $sql = "SELECT * FROM alumnos
            WHERE curso = '$curso'
            AND email_educamos != '$email_actual'";

    $resultado = mysqli_query($conexion, $sql);

    $numero_alumnos = mysqli_num_rows($resultado);

    if ($numero_alumnos < 25) {

        $sql = "UPDATE alumnos SET
                nombre = '$nombre',
                apellido1 = '$apellido1',
                apellido2 = '$apellido2',
                fecha_nacimiento = '$fecha_nacimiento',
                curso = '$curso',
                email_educamos = '$email_educamos',
                contrasena_educamos = '$contrasena_educamos'
                WHERE email_educamos = '$email_actual'";

        mysqli_query($conexion, $sql);

        echo "Alumno modificado correctamente";

    } else {

        echo "No se puede modificar. El curso ya tiene 25 alumnos.";

    }
}

mysqli_close($conexion);

?>

</body>
</html>