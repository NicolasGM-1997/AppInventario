<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_buscador.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Busqueda de Productos </title>
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
	<form action="buscar_m.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr><td>Codigo:</td><td><input type="text" name="cod"></td></tr>			
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
   
    $codigo = $_POST['cod'];

    $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_pd,$tabla_c,$tabla_s WHERE (id_prod = $codigo) and ($tabla_pd.id_cat = $tabla_c.id_cat) and ($tabla_pd.id_sede = $tabla_s.id_sede)");
    while($consulta = mysqli_fetch_array($resultado))
        {
	    $imagen='<img src="../images/'.$consulta['id_prod'].'.JPG" class="img_p">';
	    $valor=number_format($consulta['precio_v']);
            echo 
            " <center>
              <table width=\"70%\" class=\"tabla1\" height=\"100px\">
                <tr class=\"tamaño1\">
                  <td class=\"desc\"><b><center>Descripcion</center></b></td>
                  <td class=\"campo\"><b><center>Color</center></b></td>
                  <td class=\"campo\"><b><center>Peso</center></b></td>
                  <td class=\"campo\"><b><center>Fecha de Ingreso</center></b></td>
                  <td class=\"campo\"><b><center>Precio de Venta</center></b></td>
                  <td class=\"campo\"><b><center>Categoria</center></b></td>
                  <td class=\"campo\"><b><center>Sede</center></b></td>
                  <td><b><center>Imagen</center></b></td>
                </tr>
                <tr class=\"tamaño2\">
                  <td class=\"desc\"><center>".$consulta['descripcion']."</center></td>
                  <td class=\"campo\"><center>".$consulta['color']."</center></td>
                  <td class=\"campo\"><center>".$consulta['peso']."</center></td>
				          <td class=\"campo\"><center>".$consulta['fecha_i']."</center></td>
                  <td class=\"campo\"><center>$ ".$valor."</center></td>
                  <td class=\"campo\"><center>".$consulta['nombre']."</center></td>
                  <td class=\"campo\"><center>".$consulta['sede']."</center></td>
                  <td><center>".$imagen."</center></td>
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