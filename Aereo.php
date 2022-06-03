<?php
/* De los viajes aéreos se conoce el número del vuelo,
    la categoría del asiento (primera clase o no), 
    nombre de la aerolínea, 
    y la cantidad de escalas del vuelo en caso de tenerlas.
*/

class Aereo extends Viaje{

    private $nroVuelo;
    private $catAsientos;
    private $nomAerolinea;
    private $cantEscalas;

    
/* ---- getters &setters ------ */
public function getNroVuelo(){
    return $this->nroVuelo ;
}
public function setNroVuelo($nNroVuelo){
    $this->nroVuelo = $nNroVuelo;
}
public function getCatAsientos(){
    return $this->catAsientos ;
}
public function setCatAsientos($nCatAsiento){
    $this->catAsientos = $nCatAsiento;
}
public function getNomAerolinea(){
    return $this->nomAerolinea ;
}
public function setNomAerolinea($nNomAerolinea){
    $this->nomAerolinea = $nNomAerolinea;
}
public function getCantEscalas(){
    return $this->cantEscalas ;
}
public function setCantEscalas($nCantEscalas){
    $this->cantEscalas = $nCantEscalas;
}


/*  --------  metodos  --------- */

public function __construct($ncantAsientos,$ndestino,$nvalorViaje,$ntipoBoleto,$nroVuelo,$catAsientos,$nomAerolinea,$cantEscalas){
    parent::__construct($ncantAsientos,$ndestino,$nvalorViaje,$ntipoBoleto);
    $this->nroVuelo = $nroVuelo;
    $this->catAsientos = $catAsientos;
    $this->nomAerolinea = $nomAerolinea;
    $this->cantEscalas = $cantEscalas;
}

public function __toString(){
    $datosViaje = parent::__toString();
    return "\n----------- Viaje Aereo --------------\n".$datosViaje. "\nNro de Vuelo: ". $this->getNroVuelo(). "\t- Aerolinea: ". $this->getNomAerolinea().
    "\nCant. de Escalas: ". $this->getCantEscalas(). "- Asientos tipo: ". $this->getCatAsientos()."\n-----------------------";
}

public function importeViaje(){
    $importe = parent::importeViaje();
    /* Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, */
    if($this->getCatAsientos() == "Primera Clase"){
        $importe = $importe * 1.4;

    /* si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el 
    importe del viaje un 60%. */
    }
    if($this->getCantEscalas() > 0){
        $cantEscalas = $this->getCantEscalas();
        $importe = ( ($importe * 1.6) * $cantEscalas );
    }
    
    /* Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. */
    if($this->getTipoBoleto() == "Ida y Vuelta"){
        $importe = $importe * 1.5;
    }
    return $importe;
}


}
?>