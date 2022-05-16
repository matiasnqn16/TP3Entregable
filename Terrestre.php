<?php
/* 
    De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama.
 */

class Terrestre extends Viaje{
    private $catAsientos;

/* ---- getters &setters ------ */
public function getCatAsientos(){
    return $this->catAsientos ;
}
public function setCatAsientos($nCatAsientos){
    $this->catAsientos = $nCatAsientos;
}


/*  --------  metodos  --------- */
public function __construct($ncantAsientos,$ndestino,$nvalorViaje,$ntipoBoleto,$ncatAsientos){
    parent::__construct($ncantAsientos,$ndestino,$nvalorViaje,$ntipoBoleto);
    $this->catAsientos = $ncatAsientos;
}

public function __toString(){
    $datos = parent::__toString();
    return $datos. "\nCategoria: ".$this->catAsientos;
}


}
?>