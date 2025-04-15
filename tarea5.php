<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes - Carrito de Compra</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Paquetes Turísticos Disponibles</h2>

    <form action="carrito.php" method="post">
        <label for="paquete">Selecciona un paquete:</label>
        <select name="paquete" id="paquete">
            <option value="París - 5 días - $1500">París - 5 días - $1500</option>
            <option value="Cancún - 7 días - $2000">Cancún - 7 días - $2000</option>
            <option value="Roma - 4 días - $1200">Roma - 4 días - $1200</option>
        </select>
        <button type="submit" name="agregar">Agregar al Carrito</button>
    </form>

    <h2>Carrito de Compra</h2>
    <?php include 'carrito.php'; ?> 

</body>
</html>
