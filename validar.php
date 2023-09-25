<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles_validar.css">   
    <link rel="icon" type="image/png" href="../images/icono.png" />
	<title>Validacion Usuario</title>
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
	<h1> Por favor Valide su Cuenta </h1>
	<form action="Validar.php" method="POST">
        <table class="p" cellspacing="10px">
            <tr><td> Usuario:</td><td><input type="text" name="user"></td></tr>
            <tr><td> Contraseña:</td><td width="60%"><input type="password" name="pass"></td></tr>
        </table><br>
		<input type="submit" name="Ingresar" value="Ingresar">
        <input class="btn-1"  onClick="window.location.href='Index.html'" name="submit" type="button" value="Volver" /> <br><br>
    </center>
	</form>


<?php

if(isset($_POST['Ingresar']))
    {
    include("abrir_conexion.php");

    	$user = $_POST['user'];
    	$pass = $_POST['pass'];

    	if(empty($user) || empty($pass)){
    		echo "Los campos estan vacios, Por favor ingrese los datos nuevamente.";
    	} else {
    		$consulta1 = mysqli_query($conexion,"SELECT * FROM $tabla_u WHERE usuario = '$user' AND password = '$pass'");
            $consulta2 = mysqli_query($conexion,"SELECT * FROM $tabla_u WHERE usuario = '$user'");
            $tipo = mysqli_fetch_array($consulta2);
    		$validar = mysqli_num_rows($consulta1);
            if($validar>0){
    			sleep(1);
    			header('location:'.$tipo['tipo'].'/inicio.html');
  		  	} else { 
    			echo "Los datos son incorrectos, Por favor ingrese los datos nuevamente.";
	    	}
    	}

    include("cerrar_conexion.php");
    
    }
?>
        <footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>
</body>
</html>
