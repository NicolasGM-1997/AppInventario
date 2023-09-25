<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_consultas.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Consulta de Datos </title>
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
	</div>
	<center>
	<h1> Seleccione la consulta que desea hacer </h1>
	<form action="consulta.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr>
				<td><b>Ingresos:</b></td><td><input type="submit" name="ingresos" value="ingresos" class="btn1"></td>
			</tr>
			<tr>
				<td><b>Cantidad:</b></td><td><input type="submit" name="cantidad" value="cantidad" class="btn1"></td>
			</tr>
		</table><br>
	<input class="btn"  onClick="window.location.href='inicio.html'" name="submit" type="button" value="Volver"/> <br><br>
	</form><br><br>
	</center>
	<?php

if(isset($_POST['ingresos']))
{
	include("abrir_conexion.php");

	$div1 = mysqli_query($conexion,"SELECT COUNT(id_fact) FROM $tabla_f");
	while($res = mysqli_fetch_array($div1))
	{
		$num1 = $res['COUNT(id_fact)'];
	}
	$div2 = mysqli_query($conexion,"SELECT COUNT(id_det) FROM $tabla_d");
	while($res2 = mysqli_fetch_array($div2))
	{
		$num2 = $res2['COUNT(id_det)'];
	}
	$resultados = mysqli_query($conexion,"SELECT SUM(valor_total)/$num1,SUM(valor_x_uni)/$num2 FROM $tabla_f,$tabla_d");
	while($consulta = mysqli_fetch_array($resultados))
	{
		$total = number_format($consulta['SUM(valor_total)/'.$num1.''] - $consulta['SUM(valor_x_uni)/'.$num1.'']);
		$fact = number_format($consulta['SUM(valor_total)/'.$num1.'']);
		$det = number_format($consulta['SUM(valor_x_uni)/'.$num1.'']);
		echo 
		"
		<center>
            <table width=\"70%\" class=\"tabla1\" height=\"100px\">
            <tr class=\"tamaño1\">
                <td class=\"campo\"><b><center>Total Facturas</center></b></td>
                <td class=\"campo\"><b><center>Total Detalles</center></b></td>
                <td class=\"campo\"><b><center>Total Ganancias</center></b></td>
            </tr>
             <tr class=\"tamaño2\">
                <td class=\"campo\"><b><center>".$fact."</center></b></td>
                <td class=\"campo\"><b><center>".$det."</center></b></td>
                <td class=\"campo\"><b><center>".$total."</center></b></td>
            </tr>
            </table>
        </center>
        ";
    }

	include("cerrar_conexion.php");
}

if(isset($_POST['cantidad']))
{
	include("abrir_conexion.php");

	$resultados = mysqli_query($conexion,"SELECT $tabla_c.nombre,$tabla_pd.descripcion,$tabla_d.id_det,$tabla_d.valor_x_uni FROM $tabla_c,$tabla_pd,$tabla_d WHERE $tabla_d.id_prod=$tabla_pd.id_prod and $tabla_c.id_cat=$tabla_pd.id_cat");
	while($consulta = mysqli_fetch_array($resultados))
	{
		$valor = number_format($consulta['valor_x_uni']);
		echo 
		"<center>
			<table width=\"70%\" class=\"tabla1\" height=\"100px\">
            <tr class=\"tamaño1\">
                <td class=\"campo\"><b><center>Categoria</center></b></td>
                <td class=\"campo\"><b><center>Producto</center></b></td>
                <td class=\"campo\"><b><center>Detalle</center></b></td>
                <td class=\"campo\"><b><center>Valor Unitario</center></b></td>
            </tr>
             <tr class=\"tamaño2\">
                <td class=\"campo\"><b><center>".$consulta['nombre']."</center></b></td>
                <td class=\"campo\"><b><center>".$consulta['descripcion']."</center></b></td>
                <td class=\"campo\"><b><center>".$consulta['id_det']."</center></b></td>
                <td class=\"campo\"><b><center>".$valor."</center></b></td>
            </tr>
            </table>
        </center>
        ";
	}

	include("cerrar_conexion.php");
}

?>

	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>
</body>
</html>