<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_validar.css">
	<link rel="icon" type="image/png" href="images/icono.png" />
	<title> Registro Usuario </title>
</head>
<body>        
    <div class="nav">
        <nav>
        <p class="titulo">APP DE INVENTARIO</p>
        <ul>
            <li><a href="Index.html">Inicio</a></li>
            <li><a href="Caracteristicas.html">Caracteristicas</b></a></li>
            <li><a href="Planes.html">Planes</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
            <li><a href="Nosotros.html">Sobre Nosotros</a></li>
        </ul>
    </nav>
    </div>
    <center>
    <h1> Por favor Registre sus Datos </h1>
	<form action="login.php" method="POST">
		<table class="p" cellpadding="7px">
			<tr><td>Nombre: </td><td><input type="text" name="nom"></td></tr>
			<tr><td>Tipo:</td><td><select name="tipo">
				<option value=""></option>
				<option value="Administrador">Administrador</option>
				<option value="Empleado">Empleado</option>
				<option value="Cliente">Cliente</option>			
			</select></td></tr>
			<tr><td>Usuario: </td><td><input type="text" name="user"></td></tr>
			<tr><td>Contraseña: </td><td><input type="password" name="pass"></td></tr>
			<tr><td>Cedula:</td><td><input type="text" name="ced"></td></tr>
			<tr><td>Telefono:</td><td><input type="text" name="tel"></td></tr>
			<tr><td>Direccion:</td><td><input type="text" name="dir"></td></tr>
		</table><br>
		<input type="submit" name="Ingresar" value="Ingresar">	
		<input class="btn-1"  onClick="window.location.href='Index.html'" name="submit" type="button" value="Volver" /> <br><br>
	</form>
	</center>
	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>

<?php

if(isset($_POST['Ingresar']))
    {
    include("abrir_conexion.php");

        $nombre = $_POST['nom'];
        $tipo = $_POST['tipo'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $cedula = $_POST['ced'];
        $telefono = $_POST['tel'];
        $direccion = $_POST['dir'];
        
        $sql = "INSERT INTO $tabla_u(id_user,nomb_u,tipo,usuario,password,cedula,telefono,direccion) VALUES (NULL,'$nombre','$tipo','$user','$pass','$cedula','$telefono','$direccion')";
       
   		if($conexion->query($sql) === TRUE) {
			sleep(2);
			header('location: Validar.php');
		} else{
			echo "Error: " . $sql . "<br>" .$conexion->error;
		}

    include("cerrar_conexion.php");
    
	}
?>
</body>
</html>

