<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_ingreso.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Ingreso de Categorias </title>
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
	<h1>Por Favor Ingreso los Datos de la Categoria</h1>
	<form method="POST" action="categoria.php">
		<table class="p" cellpadding="7px">
			<tr><td>Nombre:</td><td><input type="text" name="nom"></td></tr>
			<tr><td>Tipo:</td><td><select name="tipo">
			<option value=""></option>
			<option value="Electronico">Electronico</option>
			<option value="Celular">Celular</option>
			<option value="Electrodomestico">Electrodomestico</option>
			</select></td></tr>
			<tr><td>Precio Unitario:</td><td><input type="text" name="pre_u"></td></tr>
			<tr><td>Cantidad:</td><td><input type="text" name="can"></td></tr>
			<tr><td>ID Proveedor:</td><td><select name="id_prov">
			<option value=""></option>
			<option value="101">101</option>
			<option value="102">102</option>
			<option value="103">103</option>
			<option value="104">104</option>
			<option value="105">105</option>
			<option value="106">106</option>
			</select></td></tr>
		</table><br>
		<input type="submit" name="Ingresar" value="Ingresar">
		<input class="btn-1"  onClick="window.location.href='Inicio.html'" name="submit" type="button" value="Inicio" /> <br><br>
	</form>
	</center>
	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>

<?php

if(isset($_POST['Ingresar']))
    {
    include("abrir_conexion.php");

    $nombre = $_POST['nom'];
    $tipo = $_POST['tipo'];
    $precio_u = $_POST['pre_u'];
    $cantidad = $_POST['can'];
    $id_prov = $_POST['id_prov'];

    $sql = "INSERT INTO $tabla_c(id_cat,nombre,tipo,precio_x_uni,cantidad,id_prov) VALUES (NULL,'$nombre','$tipo',$precio_u,$cantidad,$id_prov)";
       
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
