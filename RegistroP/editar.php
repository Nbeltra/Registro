<?php
include("conexion.php");
?>

<html lang="en">

<head>
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {

        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];

        $sql="update paciente set nombre='".$nombre."',telefono='".$telefono."',correo='".$correo."'where id='".$id."'";
        $resultado=mysqli_query($conexion,$sql);

        if($resultado){
            echo "<script language='JavaScript'>
            alert('los datos se actualizaron');location.assign('index.php');
            </script>";
        }else{
            echo "<script language='JavaScript'>
            alert('los datos No se actualizaron');location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);

    } else {
        $id = $_GET['id'];
        $sql = "select * from paciente where id='" . $id . "'";
        $resultado = mysqli_query($conexion, $sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nombre=$fila["nombre"];
        $telefono=$fila["telefono"];
        $correo=$fila["correo"];

        mysqli_close($conexion);
    ?>
        <h1>Editar paciente</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Nombre.</label>
            <input type="text" name="Nombre" value="<?php echo $nombre; ?>"><br>
            <label>telefono</label><input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
            <label>Correo</label><input type="text" name="correo" value="<?php echo $correo; ?>"><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" name="enviar" value="Actualizar">
            <a href="index.php">Regresar</a>

        </form>
    <?php
    }
    ?>
</body>

</html>