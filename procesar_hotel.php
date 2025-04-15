<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones = $_POST['habitaciones'];
    $tarifa = $_POST['tarifa'];

    if (!empty($nombre) && !empty($ubicacion) && !empty($habitaciones) && !empty($tarifa)) {
        try {
            $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$nombre, $ubicacion, $habitaciones, $tarifa]);

            echo "Hotel registrado con éxito.";
        } catch (PDOException $e) {
            echo "Error al registrar hotel: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
