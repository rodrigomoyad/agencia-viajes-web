<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $fecha = $_POST["fecha"];
    $plazas = $_POST["plazas"];
    $precio = $_POST["precio"];

    if (empty($origen) || empty($destino) || empty($fecha) || $plazas <= 0 || $precio <= 0) {
        die("Error: Todos los campos son obligatorios y deben ser valores positivos.");
    }

    try {
        $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$origen, $destino, $fecha, $plazas, $precio]);
        echo "Vuelo registrado correctamente.";
    } catch (PDOException $e) {
        echo "Error al registrar vuelo: " . $e->getMessage();
    }
}
?>
