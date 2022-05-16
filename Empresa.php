<?php

/*  La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: Terrestres o Aéreos, 

    guardar su importe e indicar si el viaje es de ida y vuelta.
*/

class Empresa{
    private $objViaje;
    private $colVentasPasajeros = [];


/* ------ getters & setters------- */
public function getObjViaje(){
    return $this->objViaje ;
}
public function setObjViaje($nObj){
    $this->objViaje = $nObj;
}

public function getColVentasPasajeros(){
    return $this->colVentasPasajeros ;
}

public function setColVentasPasajeros($nVenta){
    $this->colVentasPasajeros = $nVenta;
}


/* -------  metodos  ------- */

public function __construct($nobjViaje){
    $this->objViaje = $nobjViaje;
    $this->colVentasPasajeros;
}

public function __toString(){
    return "Viaje a ".$this->getObjViaje()->getDestino(). "-------- Asientos Disponibles: ". $this->cantAsientosDisp().
    "\n\tDetalles del viaje:\n". $this->getObjViaje() .
    "\n\t-------Lista de Pasajeros------- \n". $this->listaPasajeros();
    
}


/* listar pasajeros en una variable y retornar */
/* @return string */

private function listaPasajeros(){
    $lista = "";
    $colPasajeros = $this->getColVentasPasajeros();
    if($colPasajeros == null){
        $lista = "";
    }else{
        foreach($colPasajeros as $pasajero){
            $lista .= $pasajero;
        }
    }
    return $lista;
}


/* contar la cantidad de asientos disponibles y retornar el valor */
/* @return int */

private function cantAsientosDisp(){
    $viaje = $this->getObjViaje();
    $cantAsientosViaje = $viaje->getCantAsientos();
    $colPasajeros = $this->getColVentasPasajeros();
    if(is_array($colPasajeros)){
        $cantPasajeros = count($colPasajeros);
    }else{
        $cantPasajeros = 0;
    }
    $cantDisponible = $cantAsientosViaje - $cantPasajeros;
    return $cantDisponible;
}

/*  La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar la función venderPasaje(pasajero) 
    que registra la venta de un viaje al pasajero que es recibido por parámetro. 
    *****La venta se realiza solo si hayPasajesDisponible.*****

    El método retorna el importe del pasaje si se pudo realizar la venta.
    */
/* @param object $pasajero */
/* @return int */


public function venderPasaje($pasajero){
    $retornar = null;
    $viaje = $this->getObjViaje();
    $valorBase = $viaje->getValorViaje();
    $valorNeto = $valorBase;
    if($this->hayPasajeDisponible()){
        /* Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%. */
        if(is_a($viaje,'Terrestre')){
            if($viaje->getCatAsientos() == "cama"){
                $valorNeto = $valorNeto + ($valorBase*0.25);
            }
        }
        /* Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, */
        if(is_a($viaje,'Aereo')){
            if($viaje->getCatAsientos() == "Primera Clase"){
                $valorNeto = $valorNeto + ($valorBase*0.4);
                /* si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el 
                importe del viaje un 60%. */
                if($viaje->getCantEscalas() > 0){
                    $cantEscalas = $viaje->getCantEscalas();
                    $valorNeto = $valorNeto + ( ($valorBase*0.6) * $cantEscalas );
                }
            }
        }
        /* Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. */
        if($viaje->getTipoBoleto() == "Ida y Vuelta"){
            $valorNeto = $valorNeto * 0.5;
        }
    $pasajero->setObjPasaje($viaje);
    $pasajero->setValorFinalViaje($valorNeto);
    if($this->getColVentasPasajeros() == null){
        $this->setColVentasPasajeros(array($pasajero));
    }else{
        $colPasajeros = $this->getColVentasPasajeros();
        array_push($colPasajeros,$pasajero);
        $this->setColVentasPasajeros($colPasajeros);
    }

    $retornar = $valorNeto;
    }
    return $retornar;
}

/*  Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la 
    cantidad máxima de pasajeros y falso caso contrario. 
*/
public function hayPasajeDisponible(){
    $retornar = false;
    if($this->cantAsientosDisp() > 0){
        $retornar = true;
    }
    return $retornar;
}
}

?>