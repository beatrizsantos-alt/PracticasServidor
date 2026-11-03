<?php

require_once __DIR__ . '/Monoplaza.php';
class F3 extends Monoplaza {
    protected $academia;

    public function __construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $academia, $puntos = 0) {
        parent::__construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $puntos);
        $this->academia = $academia;
    }

    public function posicionValida($posicion) {
        return $posicion >= 1 && $posicion <= 30;
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

        $this->puntos = $this->puntos + $puntosGanados;

        return $this->puntos;
    }

    
    public function subirCategoria($superlicencia) {

        require_once 'F2.php';

        $nuevoPiloto = new F2(
            $this->nombre,
            $this->nacionalidad,
            $this->num_monoplaza,
            $this->escuderia,
            $superlicencia,
            $this->puntos
        );

        return $nuevoPiloto;
    }


}
