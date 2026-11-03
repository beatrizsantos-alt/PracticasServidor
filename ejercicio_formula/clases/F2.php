<?php

require_once __DIR__ . '/Monoplaza.php';
class F2 extends Monoplaza {
    protected $superlicencia;

    public function __construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $superlicencia, $puntos = 0) {
        parent::__construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $puntos);
        $this->superlicencia = $superlicencia;
    }

    public function posicionValida($posicion) {
        return $posicion >= 1 && $posicion <= 24;
    }

    
    public function otorgarPuntos($posicion, $vueltaRapida) {

        if ($this->posicionValida($posicion) == false) {
            return false;
        }

        $puntosGanados = 0;

        if ($posicion == 1) {
            $puntosGanados = 10;
        } else if ($posicion == 2) {
            $puntosGanados = 8;
        } else if ($posicion == 3) {
            $puntosGanados = 7;
        } else if ($posicion == 4) {
            $puntosGanados = 6;
        } else if ($posicion == 5) {
            $puntosGanados = 5;
        } else if ($posicion == 6) {
            $puntosGanados = 4;
        } else if ($posicion == 7) {
            $puntosGanados = 3;
        } else if ($posicion == 8) {
            $puntosGanados = 2;
        } else if ($posicion == 9) {
            $puntosGanados = 1;
        }

        if ($vueltaRapida == true && $posicion <= 10) {
            $puntosGanados = $puntosGanados + 1;
        }

        $this->puntos = $this->puntos + $puntosGanados;

        return $this->puntos;
    }

    
    public function subirCategoria($nomPatrocinador) {

        if ($this->superlicencia == false) {
            return false;
        }

        require_once 'F1.php';

        $nuevoPiloto = new F1(
            $this->nombre,
            $this->nacionalidad,
            $this->num_monoplaza,
            $this->escuderia,
            $nomPatrocinador,
            $this->puntos
        );

        return $nuevoPiloto;
    }



}