<?php

require_once __DIR__ . '/Monoplaza.php';
class FAcademy extends Monoplaza {

    protected $potenciaMax;
    
    public function __construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $potenciaMax, $puntos = 0) {
        parent::__construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $puntos);
        $this->potenciaMax = $potenciaMax;
    }

    
    public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 18;
    }
    
    public function otorgarPuntos($posicion, $vueltaRapida) {

        if ($this->posicionValida($posicion) == false) {
            return false;
        }

        $puntosGanados = 0;

        if ($posicion == 1) {
            $puntosGanados = 18;
        } else if ($posicion == 2) {
            $puntosGanados = 15;
        } else if ($posicion == 3) {
            $puntosGanados = 12;
        } else if ($posicion == 4) {
            $puntosGanados = 10;
        } else if ($posicion == 5) {
            $puntosGanados = 8;
        } else if ($posicion == 6) {
            $puntosGanados = 6;
        } else if ($posicion == 7) {
            $puntosGanados = 4;
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

    
    public function subirCategoria($pais) {

        require_once 'F4.php';

        $nuevoPiloto = new F4(
            $this->nombre,
            $this->nacionalidad,
            $this->num_monoplaza,
            $this->escuderia,
            $pais,
            $this->puntos
        );

        return $nuevoPiloto;
    }


}
