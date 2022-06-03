<?php


/* guardar su importe e indicar si el viaje es de ida y vuelta. */
class Viaje{ 
    private $cantAsientos;
    private $destino;
    private $valorViaje;
    private $tipoBoleto; //si es "ida" o "idaVuelta"

/* Getters & Setters */
    
    public function getCantAsientos(){
        return $this->cantAsientos;
    }
    public function setCantAsientos($cantAsientosN){
        $this->cantAsientos = $cantAsientosN;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destinoN){
        $this->destino = $destinoN;
    }
    public function getValorViaje(){
        return $this->valorViaje;
    }
    public function setValorViaje($valorViajeN){
        $this->valorViaje = $valorViajeN;  
    }
    public function getTipoBoleto(){
        return $this->tipoBoleto;
    }
    public function setTipoBoleto($nTipoBoleto){
        $this->tipoBoleto = $nTipoBoleto;
    }
    
    
    

/* Metodos */

    public function __construct($ncantAsientos,$ndestino,$nvalorViaje,$ntipoBoleto){
        
        $this->cantAsientos = $ncantAsientos;
        $this->destino = $ndestino;
        $this->valorViaje = $nvalorViaje;
        $this->tipoBoleto = $ntipoBoleto;

    }

    public function __toString(){
        return "Destino: ". $this->getDestino(). "\t- Cantidad de Asientos: ". $this->getCantAsientos(). 
        "\t- ValorBase: ". $this->getValorViaje(). "\t- Boleto de ". $this->getTipoBoleto();
    }


    public function importeViaje(){
        return $this->getValorViaje();
    }


}
?>