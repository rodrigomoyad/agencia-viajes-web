<?php
$conexion = new mysqli("localhost", "root", "", "AGENCIA");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM RESERVA";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas de la Agencia</title>
</head>
<body>
    <h2>Lista de Reservas</h2>
    <table border="1">
        <tr>
            <th>ID Reserva</th>
            <th>ID Cliente</th>
            <th>Fecha Reserva</th>
            <th>ID Vuelo</th>
            <th>ID Hotel</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["id_reserva"]; ?></td>
                <td><?php echo $fila["id_cliente"]; ?></td>
                <td><?php echo $fila["fecha_reserva"]; ?></td>
                <td><?php echo $fila["id_vuelo"]; ?></td>
                <td><?php echo $fila["id_hotel"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conexion->close();
?>
