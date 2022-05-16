<?php
include ("Pasajero.php");
include ("Empresa.php");
include ("Viaje.php");
include ("Terrestre.php");
include ("Aereo.php");

$viaje = new Aereo(4,"neuquen-cordoba",500,"Ida Y Vuelta","V-0253","Primera Clase","AArgentinas",2);

$viaje2 = new Terrestre(3,"cipolletti-senillosa",200,"Ida","cama");

$miEmpresa = new Empresa($viaje);
$miOtraEmpresa = new Empresa($viaje2);

$persona = new Pasajero("Arroz Azucar",423523);
$per = new Pasajero("Bebida Blanca",423453);

echo "\n///////////////////////////////////\n";
echo $miEmpresa;

echo "\n\n"."Comprando viaje :pip:". "\nValor final: ".$miEmpresa->venderPasaje($persona) . "\n";

echo "\n\n"."Comprando viaje :pip:". "\nValor final: ".$miEmpresa->venderPasaje($per)  . "\n";

echo "\n///////////////////////////////////\n";
echo $miEmpresa;

/////////////////////////////////////////////////

echo "\n///////////////////////////////////\n";
echo $miOtraEmpresa;

echo "\n\n"."Comprando viaje :pip:". "\nValor final: ".$miOtraEmpresa->venderPasaje($persona) . "\n";

echo "\n\n"."Comprando viaje :pip:". "\nValor final: ".$miOtraEmpresa->venderPasaje($per)  . "\n";

echo "\n///////////////////////////////////\n";
echo $miOtraEmpresa;

?>