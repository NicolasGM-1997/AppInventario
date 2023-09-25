<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_buscador.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Busqueda de facturas </title>
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
	<h1>Introduzca el codigo del producto que desea buscar</h1>
	<form action="buscar_f.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr><td>Numero de Factura:</td><td><input type="text" name="num"></td></tr>			
		</table><br>
		<input type="submit" name="Ingresar" value="Ingresar">
		<input class="btn-1"  onClick="window.location.href='Inicio.html'" name="submit" type="button" value="Inicio" /> <br><br>
	</form><br>
	</center>
	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>

<?php

if(isset($_POST['Ingresar']))
    {
    include("abrir_conexion.php");
   
    $numero = $_POST['num'];

    $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_f,$tabla_s,$tabla_e,$tabla_u WHERE (id_fact = $numero) and ($tabla_f.id_sede=$tabla_s.id_sede) and ($tabla_f.id_emp=$tabla_e.id_emp) and ($tabla_f.id_user=$tabla_u.id_user)");
    while($consulta = mysqli_fetch_array($resultado))
        {
	      $valor=number_format($consulta['valor_total']);
            echo 
            " <center>
              <table width=\"70%\" class=\"tabla1\" height=\"100px\">
                <tr class=\"tamaño1\">
                  <td class=\"campo\"><b><center>Numero de Factura</center></b></td>
                  <td class=\"campo\"><b><center>Fecha</center></b></td>
                  <td class=\"campo\"><b><center>Valor Total</center></b></td>
                  <td class=\"campo\"><b><center>Sede</center></b></td>
                  <td class=\"campo\"><b><center>Vendedor</center></b></td>
                  <td class=\"campo\"><b><center>Cliente</center></b></td>
                </tr>
                <tr class=\"tamaño2\">
                  <td class=\"campo\"><center>".$consulta['id_fact']."</center></td>
                  <td class=\"campo\"><center>".$consulta['fecha']."</center></td>
                  <td class=\"campo\"><center>$ ".$valor."</center></td>
				          <td class=\"campo\"><center>".$consulta['sede']."</center></td>
                  <td class=\"campo\"><center>".$consulta['nombre']."</center></td>
                  <td class=\"campo\"><center>".$consulta['nomb_u']."</center></td>
                </tr>
              </table>
              </center>
            ";
        }

    include("cerrar_conexion.php");
    
	}

?>

</body>
</html>