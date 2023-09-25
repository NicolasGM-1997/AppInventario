<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_buscador.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<style> #map1,#map2,#map3 { height: 150px; width: 90%;}        }
    </style>
	<title> Busqueda de sedes </title>
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
	</nav>
	<center>
	<h1>Introduzca el nombre de la sede que desea buscar</h1>
	<form action="buscar_s.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr><td>Nombre:</td><td><input type="text" name="nom"></td></tr>			
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
   
    $nombre = $_POST['nom'];
    $mapa1 = "<iframe id=\"map1\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" 
          	src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyCCsVDwTb1IuNw2HeDCy4v3PtVpgB8V6UE&q=Bogota+calle+19+7+12\" allowfullscreen>
			</iframe>";
	$mapa2 = "<iframe id=\"map2\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" 
          	src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyCCsVDwTb1IuNw2HeDCy4v3PtVpgB8V6UE&q=Bogota+calle+150+21+5\" allowfullscreen>
			</iframe>";
	$mapa3 = "<iframe id=\"map3\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" 
          	src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyCCsVDwTb1IuNw2HeDCy4v3PtVpgB8V6UE&q=Bogota+calle+26+sur+41+77\" allowfullscreen>
			</iframe>";

    $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_s WHERE sede = '$nombre'");
    while($consulta = mysqli_fetch_array($resultado))
        {
          if($nombre === "sur")
		  {
		  	$lugar=$mapa3;
		  } else {
		  	if($nombre === "norte")
		  	{
		  	  $lugar=$mapa2;
		  	} else {
		  	  $lugar=$mapa1;
		  	}
		  }

          echo
            " <center>
              <table width=\"70%\" class=\"tabla1\" height=\"100px\">
                <tr class=\"tamaño1\">
                  <td class=\"campo\"><b><center>Codigo</center></b></td>
                  <td class=\"campo\"><b><center>Sede</center></b></td>
                  <td class=\"campo\"><b><center>Telefono</center></b></td>
                  <td class=\"campo\"><b><center>Direccion</center></b></td>
                  <td class=\"campo\"><b><center>Director</center></b></td>
                  <td class=\"desc\"><b><center>Mapa</center></b></td>
                </tr>
                <tr class=\"tamaño2\">
                  <td class=\"campo\"><center>".$consulta['id_sede']."</center></td>
                  <td class=\"campo\"><center>".$consulta['sede']."</center></td>
                  <td class=\"campo\"><center>".$consulta['telefono']."</center></td>
				  <td class=\"campo\"><center>".$consulta['direccion']."</center></td>
                  <td class=\"campo\"><center>".$consulta['director']."</center></td>
                  <td class=\"desc\"><center>".$lugar."</center></td>
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