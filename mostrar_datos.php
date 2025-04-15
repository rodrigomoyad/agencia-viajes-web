<?php
include 'conexion.php';
echo "Script ejecutado";

try {
    echo "<h3>Vuelos Registrados</h3>";
    $stmt = $conexion->query("SELECT * FROM VUELO");
    echo "<table border='1'><tr><th>ID</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas</th><th>Precio</th></tr>";
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$fila['id_vuelo']}</td><td>{$fila['origen']}</td><td>{$fila['destino']}</td><td>{$fila['fecha']}</td><td>{$fila['plazas_disponibles']}</td><td>{$fila['precio']}</td></tr>";
    }
    echo "</table>";

    echo "<h3>Hoteles Registrados</h3>";
    $stmt = $conexion->query("SELECT * FROM HOTEL");
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Ubicación</th><th>Habitaciones</th><th>Tarifa</th></tr>";
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$fila['id_hotel']}</td><td>{$fila['nombre']}</td><td>{$fila['ubicación']}</td><td>{$fila['habitaciones_disponibles']}</td><td>{$fila['tarifa_noche']}</td></tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error al obtener datos: " . $e->getMessage();
}
?>
