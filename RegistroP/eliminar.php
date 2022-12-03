<?php 
$id=$_GET['id'];
include("conexion.php");

$sql="delete from paciente where id='".$id."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script languaje='JavaScript'>
    alert('los cambios se eliminaron');
    lacation.assign('index.php');
    </script>";

}else{
    echo "<script languaje='JavaScript'>
    alert('los cambios no se elimanaron');
    lacation.assign('index.php');
    </script>";
}
?>