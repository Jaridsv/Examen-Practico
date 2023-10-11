<?php

include 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conexion = conectaDB(); // CONEXION A LA BASE DE DATOS

    // CAMPOS DE LA TABLA
    $nombre = $_POST['NomProducto'];
    $precio = $_POST['Precio'];
    $existencia = $_POST['Existencia'];

    // CONSULTA SQL DE INSERCION
    $sql = "INSERT INTO tb_productos (Nombre, Precio, Ext) VALUES (?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
       
        $stmt->bind_param("sdi", $nombre, $precio, $existencia);

       if ($stmt->execute()) {
    // INSERCION CORRECTA
    header("Location: dashboard.php?success=1"); 
    exit();
} else {
    //ERROR DE INSERCION
    header("Location: dashboard.php?error=1"); 
    exit();
}

       
        $stmt->close();
    }

    
    $conexion->close();
}
?>
