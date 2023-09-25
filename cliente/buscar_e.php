<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_buscador.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Busqueda de Empleados </title>
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
	<h1>Introduzca el cargo del empleado que desea buscar</h1>
	<form action="buscar_e.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr><td>Cargo:</td><td><input type="text" name="car"></td></tr>			
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
   
    $cargo = $_POST['car'];

    $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_e,$tabla_s WHERE (cargo = '$cargo') and ($tabla_e.id_sede = $tabla_s.id_sede)");
    while($consulta = mysqli_fetch_array($resultado))
        {
            $cedula=number_format($consulta['cedula']);
            echo 
            " <center>
              <table width=\"70%\" class=\"tabla1\" height=\"100px\">
                <tr class=\"tamaño1\">
                  <td class=\"campo\"><b><center>Codigo</center></b></td>
                  <td class=\"desc\"><b><center>Nombre</center></b></td>
                  <td class=\"campo\"><b><center>Telefono</center></b></td>
                  <td class=\"campo\"><b><center>Direccion</center></b></td>
                  <td class=\"campo\"><b><center>Cedula</center></b></td>
                  <td class=\"campo\"><b><center>sede</center></b></td>
                </tr>
                <tr class=\"tamaño2\">
                  <td class=\"campo\"><center>".$consulta['id_emp']."</center></td>
                  <td class=\"desc\"><center>".$consulta['nombre']."</center></td>
                  <td class=\"campo\"><center>".$consulta['telefono']."</center></td>
				          <td class=\"campo\"><center>".$consulta['direccion']."</center></td>
                  <td class=\"campo\"><center>".$cedula."</center></td>
                  <td class=\"campo\"><center>".$consulta['sede']."</center></td>
                </tr>
              </table><br>
              </center>
            ";
        }

    include("cerrar_conexion.php");
    
	}

?>

</body>
</html>