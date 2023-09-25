<?php 
	
	$host = "localhost";    
	$basededatos = "app";    
	$usuariodb = "root";    
	$clavedb = "";    
	
	$tabla_u = "usuarios"; 
	$tabla_pd = "producto";
	$tabla_c = "categoria";
	$tabla_pv = "proveedor";
	$tabla_d = "detalles";
	$tabla_f = "facturas";
	$tabla_s = "sedes";
	$tbala_e = "empleados";  
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

	if ($conexion->connect_error) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>