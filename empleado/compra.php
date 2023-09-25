<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_ingreso.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Registro de Productos </title>
</head>
<body>	
	<div class="nav">
		<nav>
		<p class="titulo">APP DE INVENTARIO</p>
		<ul>
			<li><a href="../index.html">Inicio</a></li>
			<li><a href="../Caracteristicas.html">Caracteristicas</b></a></li>
			<li><a href="../Planes.html">Planes</a></li>
			<li><a href="../Contacto.html">Contacto</a></li>
			<li><a href="../Nosotros.html">Sobre Nosotros</a></li>
		</ul>
	</nav>
	<center>
	<h1> Por favor ingrese los Datos del Producto </h1>
	<form action="compra.php" method="POST">
		<table class="p" cellpadding="7px">
			<tr><td>Descripcion:</td><td><textarea name="desc"></textarea></td></tr>
			<tr><td>Color:</td><td><input type="text" name="col"></td></tr>
			<tr><td>Peso:</td><td><input type="text" name="peso"></td></tr>
			<tr><td>Fecha de Ingreso:</td><td><input type="date" name="fec_i"></td></tr>
			<tr><td>Precio de Venta:</td><td><input type="text" name="pre_v"></td></tr>
			<tr><td>ID Categoria:</td><td><select name="idc">
			<option value=""></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			</select></td></tr>
			<tr><td>ID Sede:</td><td><select name="ids">
			<option value=""></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></td></tr>
		</table><br>
		<input type="submit" name="Ingresar" value="Ingresar">
		<input class="btn-1"  onClick="window.location.href='Inicio.html'" name="submit" type="button" value="Inicio" /> <br><br>
	</form>
	</center><br>
	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>

<?php

if(isset($_POST['Ingresar']))
    {
    include("abrir_conexion.php");

        $descripcion = $_POST['desc'];
        $color = $_POST['col'];
        $peso = $_POST['peso'];
        $fecha_i = $_POST['fec_i'];
        $precio_v = $_POST['pre_v'];
        $idc = $_POST['idc'];
        $ids = $_POST['ids'];
        
        $sql = "INSERT INTO $tabla_pd(id_prod,descripcion,color,peso,fecha_i,precio_v,id_cat,id_sede) VALUES (NULL,'$descripcion','$color','$peso','$fecha_i',$precio_v,$idc,$ids)";
       
   		if($conexion->query($sql) === TRUE) {
			echo "<center><h2> Los datos se han ingresado correctamente. </h2></center>";
		} else{
			echo "Error: " . $sql . "<br>" .$conexion->error;
		}

    include("cerrar_conexion.php");
    
	}

?>
</body>
</html>
