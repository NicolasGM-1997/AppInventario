<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_factura.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Factura de Venta </title>
</head>
<body>
	<script lenguaje="javascript" type="text/javascript">var f=2;</script>		
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
	<h1> Factura de Venta </h1>
	<form action="factura.php" method="POST">
	<table class="p" cellspacing="0px" cellpadding="5px" border="1">
		<tr>
			<td><b>Cliente: </b><input type="text" name="cli"></td>
		</tr>
		<tr>
			<td><b>Fecha: </b><input type="date" name="fecha"></td>
		</tr>
		<tr>
			<td><b>Factura N°: </b><input type="text" name="fact"></td>
		</tr>
		<tr>
			<td><b>Sede: </b><select name="sede">
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select></td>
		</tr>
		<tr>
			<td><b>Id vendedor: </b><select name="ven">
				<option value=""></option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select></td>
		</tr>
	</table><br>
	<table class="p" cellspacing="0px" cellpadding="5px" border="1" id="insert">
		<tr>
			<td><b>Categoria</b></td>
			<td><b>Detalle</b></td>
			<td><b>ID producto</b></td>
			<td><b>Total</b></td>
		</tr>
		<tr>
			<td><select name="cat0">
				<option></option>
				<option value="Electronico">Electronico</option>
				<option value="Celular">Celular</option>
				<option value="Electrodomestico">Electrodomestico</option>
			</select></td>
			<td><textarea name="det0"></textarea></td>
			<td><input type="text" name="idp0"></td>
			<td><input type="text" name="totalxu0" id="fac0"></td>
		</tr>
	</table><br><b>
	<table class="nf">
		<tr><td><input class="btn2" onclick="nuevafila();" type="button" value="Nueva fila" />
			<script lenguaje="javascript" type="text/javascript">
				var i = 1;
				function nuevafila()
				{	
					var table = document.getElementById("insert");
					{
					var row = table.insertRow(i+1);
					var cell1 = row.insertCell(0);
  					var cell2 = row.insertCell(1);
  					var cell3 = row.insertCell(2);
  					var cell4 = row.insertCell(3);
  					cell1.innerHTML = '<select name="cant'+i+'"><option></option><option value="Electronico">Electronico</option><option value="Celular">Celular</option><option value="Electrodomestico">Electrodomestico</option></select>';
  					cell2.innerHTML = '<textarea name="det'+i+'"></textarea>';
  					cell3.innerHTML = '<input type="text" name="idp'+i+'">';
  					cell4.innerHTML = '<input type="text" name="totalxu'+i+'" id="fac'+i+'">';
					}
					i++;
					f++;
				}
			</script>
		</td>
		<td><input class="btn2" onclick="Borrarfila();" type="button" value="Borrar fila" />
			<script lenguaje="javascript" type="text/javascript">
				function Borrarfila()
				{
					if(i>1 && f>2)
					{
					document.getElementById("insert").deleteRow(i);
					i--;
					f--;}
				}		
			</script>
		</td></tr>
	</table><br>
	<table class="p" cellspacing="0px" cellpadding="5px" border="1">
		<tr>
			<td rowspan="3" colspan="2" width="200px"><b>Firma:</b></td>
			<td><b>Subtotal</b></td>
			<td><input type="text" name="subt" id="subt"></td>
		</tr>
		<tr>
			<td><b>IVA 19%</b></td>
			<td><input type="text" name="iva" id="iva"></td>
		</tr>
		<tr>
			<td><b>Total</b></td>
			<td><input type="text" name="valor" id="valor"></td>
		</tr>
	</table><br>
	<input class="btn2" onclick="calcular();" type="button" value="Total" /><br><br>
		<script lenguaje="javascript" type="text/javascript">
			function calcular() 
			{
				var v1,v2,c;
				var n1,n2,n3,n4,n5;
				if(f==2){
					n1 = parseInt(fac0.value);
					v1=n1;
				} else {
					if(f==3){
						n1 = parseInt(fac0.value);
						n2 = parseInt(fac1.value);
						v1=n1+n2;
					} else {
						if(f==4){
							n1 = parseInt(fac0.value);
							n2 = parseInt(fac1.value);
							n3 = parseInt(fac2.value);
							v1=n1+n2+n3;
						}
					}
				}
				v2= parseInt(v1*19/100);
				res = parseInt(v1+v2);
				document.getElementById('subt').value=v1;
				document.getElementById('iva').value=v2;
				document.getElementById('valor').value=res;
			}	
		</script>
	<?php $js="<script lenguaje=javascript type=text/javascript> document.writeln(f) </script>"; ?>
	<input type="submit" name="Enviar" value="Enviar">
	<input class="btn"  onClick="window.location.href='inicio.html'" name="submit" type="button" value="volver" /> <br><br>
	</form><br><br>
	</center>
	
<?php
	
if(isset($_POST['Enviar']))
    {
    include("abrir_conexion.php");

    $cliente = $_POST['cli'];
    $fecha = $_POST['fecha'];
    $valor = $_POST['valor'];
    $sede = $_POST['sede'];
    $emp = $_POST['ven'];
    $idf = $_POST['fact'];

    $buscar = mysqli_query($conexion,"SELECT * FROM $tabla_u WHERE nomb_u = '$cliente'");
   	while($consulta = mysqli_fetch_array($buscar))
   	{
   		$user=$consulta['id_user'];
   	}
    $sql1 = "INSERT INTO $tabla_f(id_fact,fecha,valor_total,id_sede,id_emp,id_user) VALUES ($idf,'$fecha',$valor,$sede,$emp,$user)";

    $desc = $_POST['det0'];
    $vxu = $_POST['totalxu0'];    
    $idp = $_POST['idp0'];

    $sql2 = "INSERT INTO $tabla_d(id_det,descripcion,valor_x_uni,id_fact,id_prod) VALUES (NULL,'$desc',$vxu,$idf,$idp)";

    if($conexion->query($sql1) && $conexion->query($sql2) === TRUE) {			
		echo "<center><h2> Los datos se han ingresado correctamente. </h2></center>";
	} else{
		echo "Error: " . $sql1 . " y " . $sql2 . "<br>" .$conexion->error;
	}

    include("cerrar_conexion.php");
    
	}

?>
<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>
</body>
</html>
