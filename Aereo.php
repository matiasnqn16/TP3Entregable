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
    return $datosViaje. "\nNro de Vuelo: ". $this->getNroVuelo(). "\t- Aerolinea: ". $this->getNomAerolinea().
    "\nCant. de Escalas: ". $this->getCantEscalas(). "- Asientos tipo: ". $this->getCatAsientos()."\n";
}


}
?>