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
    return "\n---------------------Viaje Terrestre\n".$datos. "\nCategoria: ".$this->catAsientos."\n---------------------";
}

public function importeViaje(){
    $importe = parent::importeViaje();
    /* Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%. */
    if($this->getCatAsientos() == "cama"){
        $importe = $importe * 1.25;
    }
    /* Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. */
    if($this->getTipoBoleto() == "Ida y Vuelta"){
        $importe = $importe * 1.5;
    }
    return $importe;
}

}
?>