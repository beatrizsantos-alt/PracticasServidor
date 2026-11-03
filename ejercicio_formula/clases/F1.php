<?php

require_once __DIR__ . '/Monoplaza.php';
class F1 extends Monoplaza {
    protected $nomPatrocinador;

    public function __construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $nomPatrocinador, $puntos = 0) {
        parent::__construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $puntos);
        $this->nomPatrocinador = $nomPatrocinador;
    }

    public function posicionValida($posicion) {
        return $posicion >= 1 && $posicion <= 22;
    }

    public function otorgarPuntos($posicion, $vueltaRapida) {
        $puntosGanados = 0;

        if ($this->posicionValida($posicion) ==false) {
            return false;
        }

        if ($posicion== 1) {
            $puntosGanados= 25;
        } else if ($posicion== 2) {
            $puntosGanados= 18;
        } else if ($posicion== 3) {
            $puntosGanados= 15;
        } else if ($posicion== 4) {
            $puntosGanados= 12;
        } else if ($posicion== 5) {
            $puntosGanados= 10;
        } else if ($posicion== 6) {
            $puntosGanados= 8;
        } else if ($posicion== 7) {
            $puntosGanados= 6;
        } else if ($posicion== 8) {
            $puntosGanados= 4;
        } else if ($posicion== 9) {
            $puntosGanados= 2;
        } else if ($posicion== 10) {
            $puntosGanados= 1;
        }

        if ($vueltaRapida == true && $posicion <= 10) {
            $puntosGanados= $puntosGanados + 1;
        }

        $this->puntos= $this->puntos + $puntosGanados;

        return $this->puntos;
    }

}