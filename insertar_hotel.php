<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $habitaciones = $_POST["habitaciones"];
    $tarifa = $_POST["tarifa"];

    if (empty($nombre) || empty($ubicacion) || $habitaciones <= 0 || $tarifa <= 0) {
        die("Error: Todos los campos son obligatorios y deben ser valores positivos.");
    }

    try {
        $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $ubicacion, $habitaciones, $tarifa]);
        echo "Hotel registrado correctamente.";
    } catch (PDOException $e) {
        echo "Error al registrar hotel: " . $e->getMessage();
    }
}
?>
