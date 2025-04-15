<?php
$conexion = new mysqli("localhost", "root", "", "AGENCIA");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT HOTEL.nombre, HOTEL.ubicación, COUNT(RESERVA.id_reserva) AS total_reservas
        FROM RESERVA
        INNER JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel
        GROUP BY HOTEL.id_hotel
        HAVING total_reservas > 2";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoteles con Más de 2 Reservas</title>
</head>
<body>
    <h2>Hoteles con Más de 2 Reservas</h2>
    <table border="1">
        <tr>
            <th>Nombre del Hotel</th>
            <th>Ubicación</th>
            <th>Total de Reservas</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["ubicación"]; ?></td>
                <td><?php echo $fila["total_reservas"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conexion->close();
?>
