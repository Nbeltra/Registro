<html lang="en">
<head>
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
      <?php
      if(isset($_POST['Enviar'])){
        $nombre=$_POST["id"];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];

        include("conexion.php");
        //insert into paciente (nombre,telefono)
        //values ($nombre,$telefono); 
        $sql="insert into paciente (id,nombre,telefono,correo)
        values('".$id."','".$nombre."', '".$telefono."','".$correo."')";

        $resultado= mysqli_query($conexion,$sql);

        if($resultado){
            //los datos ingresaron a la bd
            echo " <script language='JavaScript'>
            alert('los cambios fueron guardados');
            location.assign('index.php');
            </script>";

        }else{
            // los datos NO fueron guardados correctamente
            echo " <script language='JavaScript'>
            alert('ERROR: los datos NO fueron guardados');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);

      }else{
      ?>   

    <h1>Agregar Nuevo Paciente</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label> Nombre </label>
        <input type="text" name="nombre"><br>
        <label>telefono</label>
        <input type="text" name="telefono"><br>
        <label>Correo</label>
        <input type="text" name="correo"><br>
        <input type="submit" name="Enviar" value="Agregar">
        <a href="index.php">Regresar</a>
    </form>
    <?php 
    }
    ?>
</body>
</html>
