<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles_actualizar.css">   
    <link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Actualizar Datos </title>
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
    <h1> Digite el Id del producto que desea modificar </h1>
    <form action="actualizar.php" method="POST">
        <table class="j">
            <tr>
                <td><b>ID Producto:</b></td><td><input type="text" name="num"></td>
            </tr>
        </table><br>
        <input type="submit" name="Buscar" value="Buscar" class="btn">
        <input type="submit" name="Actualizar" value="Actualizar" class="btn"> <br><br>
        <input class="btn"  onClick="window.location.href='inicio.html'" type="button" value="Volver"/> <br><br>
    </center>
<?php

if(isset($_POST['Buscar']))
    {
      include("abrir_conexion.php");
      
        $prod = $_POST['num'];               
        
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_pd WHERE id_prod = $prod ");
        while($consulta = mysqli_fetch_array($resultados))
        {
        $_SESSION['num'] = $consulta['id_prod'];
        $campo1='<input type="text" name="idp" value='.$consulta['id_prod'].'>';
        $campo2='<input type="text" name="des" value='.$consulta['descripcion'].'>';
        $campo3='<input type="text" name="col" value='.$consulta['color'].'>';
        $campo4='<input type="text" name="pes" value='.$consulta['peso'].'>';
        $campo5='<input type="text" name="fec" value='.$consulta['fecha_i'].'>';
        $campo6='<input type="text" name="pre" value='.$consulta['precio_v'].'>';
        $campo7='<input type="text" name="idc" value='.$consulta['id_cat'].'>';
        $campo8='<input type="text" name="ids" value='.$consulta['id_sede'].'>';   

            echo 
            "
              <center>
              <table width=\"50%\" border=\"1\" class=\"tabla1\">
                
                <tr class=\"tamaño1\"><td>ID</td><td><center>".$campo1."</center></td></tr>
                <tr class=\"tamaño1\"><td>Descripcion</td><td><center>".$campo2."</center></td></tr>
                <tr class=\"tamaño1\"><td>Color</td><td><center>".$campo3."</center></td></tr>
                <tr class=\"tamaño1\"><td>Peso</td><td><center>".$campo4."</center></td></tr>
                <tr class=\"tamaño1\"><td>Fecha ingreso</td><td><center>".$campo5."</center></td></tr>
                <tr class=\"tamaño1\"><td>Precio de Venta</td><td><center>".$campo6."</center></td></tr>
                <tr class=\"tamaño1\"><td>Categoria</td><td><center>".$campo7."</center></td></tr>
                <tr class=\"tamaño1\"><td>Sede</td><td><center>".$campo8."</center></td></tr>
               
              </table>
              </center>
            ";

        }
        include("cerrar_conexion.php");
    }
    
if(isset($_POST['Actualizar']))
{
    include("abrir_conexion.php");

    $idp = $_POST["idp"];
    $desc = $_POST['des'];
    $color = $_POST['col'];
    $peso = $_POST['pes'];
    $fecha = $_POST['fec'];
    $precio = $_POST['pre'];
    $cat = $_POST['idc'];
    $sede = $_POST['ids'];

    mysqli_query($conexion,"UPDATE $tabla_pd SET id_prod = $idp,descripcion='$desc',color='$color',peso='$peso',fecha_i='$fecha',precio_v=$precio,id_cat=$cat,id_sede='$sede' WHERE (id_prod = $idp)");
          
    include("cerrar_conexion.php");

    echo "Se insertaron Correctamente";
}
?>

    <footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>

</body>
</html>