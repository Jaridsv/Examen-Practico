<?php

include 'conexion.php';
$id=$_GET['idPro'];

$sql="DELETE FROM tb_productos WHERE idPro='".$id."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script languaje='JavaScript'>
    alert ('los datos se eliminaron correctamente');
    location.assing('dashboard.php');
    </script>";
}else {
    echo "<script languaje='JavaScript'>
    alert ('los datos no se eliminaron correctamente');
    location.assing('dashboard.php');
    </script>";

}
?>