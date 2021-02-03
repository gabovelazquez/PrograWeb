<?php
include_once("Op.php");
$objCarrito = new CarritoCam();
$objCarrito->cargarProductos();

if (implode($_POST)!="") {
    $cadena=implode($_POST);
    echo($objCarrito->BuscarProductos($cadena));
}
$objCarrito->MostrarProductos();
?>