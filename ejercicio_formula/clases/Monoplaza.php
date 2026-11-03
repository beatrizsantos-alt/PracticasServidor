<?php
class Monoplaza {
    protected $nombre;
    protected $nacionalidad;
    protected $num_monoplaza;
    protected $escuderia;
    protected $puntos;

    public function __construct($nombre, $nacionalidad, $num_monoplaza, $escuderia, $puntos = 0) {
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
        $this->num_monoplaza = $num_monoplaza;
        $this->escuderia = $escuderia;
        $this->puntos = $puntos;
    }

    public function posicionValida($posicion) {
        return $posicion >= 1;
    }

}
