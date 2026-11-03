<?php

require_once 'clases/F1.php';
require_once 'clases/F2.php';
require_once 'clases/F3.php';
require_once 'clases/F4.php';
require_once 'clases/FAcademy.php';

echo "<h2>1. OTORGAR PUNTOS</h2>";

// PILOTO F1
$piloto1 = new F1("Charles Leclerc", "Monaguesca", 16, "Equipo F1", "WKDC");
echo "F1: " . $piloto1->otorgarPuntos(1, true) . " puntos<br>";

// PILOTO F2
$piloto2 = new F2("Piloto F2", "Española", 10, "Equipo F2", true);
echo "F2: " . $piloto2->otorgarPuntos(1, true) . " puntos<br>";

// PILOTO F3
$piloto3 = new F3("Piloto F3", "Española", 20, "Equipo F3", "Academia Ferrari");
echo "F3: " . $piloto3->otorgarPuntos(1, true) . " puntos<br>";

// PILOTO F4
$piloto4 = new F4("Piloto F4", "Española", 30, "Equipo F4", "España");
echo "F4: " . $piloto4->otorgarPuntos(1, true) . " puntos<br>";

// PILOTO FACADEMY
$piloto5 = new FAcademy("Piloto Academy", "Española", 5, "Equipo Academy", 160);
echo "FAcademy: " . $piloto5->otorgarPuntos(1, true) . " puntos<br>";


echo "<hr><h2>2. POSICION VALIDA</h2>";

$posiciones = [1, 5, 0, -1];

foreach ($posiciones as $posicion) {

    if ($piloto1->posicionValida($posicion)) {
        echo "Posición $posicion: Válida <br>";
    } else {
        echo "Posición $posicion: No válida <br>";
    }
}

echo "<hr><h2>3. SUBIDA DE CATEGORIA</h2>";

// De FAcademy a F4
$nuevoPiloto = $piloto5->subirCategoria("España");

if ($nuevoPiloto != false) {
    echo "FAcademy a F4: Correcto<br>";
}

// De F4 a F3
$nuevoPiloto2 = $piloto4->subirCategoria("Academia Ferrari");

if ($nuevoPiloto2 != false) {
    echo "F4 a F3: Correcto<br>";
}

// De F3 a F2
$nuevoPiloto3 = $piloto3->subirCategoria(true);

if ($nuevoPiloto3 != false) {
    echo "F3 a F2: Correcto<br>";
}

// De F2 a F1
$nuevoPiloto4 = $piloto2->subirCategoria("Shell");

if ($nuevoPiloto4 != false) {
    echo "F2 a F1: Correcto<br>";
}

?>

