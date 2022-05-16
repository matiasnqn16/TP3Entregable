<?php
class Pasajero{ 

    private $apellidoYNombre;
    private $dni;
    private $objPasaje;

/* Getters & Setters */

    public function getApYNom(){
        return $this->apellidoYNombre;
    }
    public function setApYNom($new){
        $this->apellidoYNombre = $new;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setDni($nDni){
        $this->dni = $nDni;
    }
    public function getObjPasaje(){
        return $this->objPasaje;
    }
    public function setObjPasaje($nuevaVariable){
        $this->objPasaje = $nuevaVariable;
    }
    public function getValorFinalViaje(){
        return $this->valorFinalViaje;
    }
    public function setValorFinalViaje($nValorFinal){
        $this->valorFinalViaje = $nValorFinal;
    }
    
    
    

/* Metodos */

    public function __construct($apYNom,$ndni){
        $this->apellidoYNombre = $apYNom;
        $this->dni = $ndni;
        $this->objPasaje = null;
        $this->valorFinalViaje = null;
    }

    private function tipoDeViajeYDesc(){
        $pasaje = $this->getObjPasaje();
        if($pasaje == null){
            $retornar = array('tipoViaje' => "N/A",'desc' => "N/A");
        }else{
            $retornar = array(
                'tipoViaje' => get_class($this->getObjPasaje()),
                "desc" => $this->getObjPasaje()
            );
        }
        return $retornar;
    }

    public function __toString(){
        $detalles = $this->tipoDeViajeYDesc();
        return "\nApellido Y Nombre: ". $this->getApYNom(). "\t- Dni ". $this->getDni() ."\n". 
        "Pasaje ". $detalles['tipoViaje'] ."\n". $detalles['desc']. "-------\n". "Valor Neto: $ ". $this->getValorFinalViaje(). "\n //////////.........\n";
    }

}
?>