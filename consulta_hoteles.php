<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$database = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT h.id_hotel, h.nombre, COUNT(r.id_reserva) AS total_reservas 
        FROM HOTEL h
        INNER JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel, h.nombre
        HAVING total_reservas > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID Hotel</th><th>Nombre</th><th>Total de Reservas</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_hotel"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["total_reservas"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles con más de 2 reservas.";
}

$conn->close();
?>
