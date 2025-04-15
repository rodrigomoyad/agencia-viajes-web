<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vuelos y Hoteles</title>
    <script>
        function validarVuelo() {
            let origen = document.getElementById("origen").value;
            let destino = document.getElementById("destino").value;
            let fecha = document.getElementById("fecha").value;
            let plazas = document.getElementById("plazas").value;
            let precio = document.getElementById("precio").value;

            if (origen === "" || destino === "" || fecha === "" || plazas === "" || precio === "") {
                alert("Todos los campos son obligatorios");
                return false;
            }
            return true;
        }

        function validarHotel() {
            let nombre = document.getElementById("nombre").value;
            let ubicacion = document.getElementById("ubicacion").value;
            let habitaciones = document.getElementById("habitaciones").value;
            let tarifa = document.getElementById("tarifa").value;

            if (nombre === "" || ubicacion === "" || habitaciones === "" || tarifa === "") {
                alert("Todos los campos son obligatorios");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

    <h2>Registrar Vuelo</h2>
    <form action="procesar_vuelo.php" method="post" onsubmit="return validarVuelo()">
        Origen: <input type="text" id="origen" name="origen"><br>
        Destino: <input type="text" id="destino" name="destino"><br>
        Fecha: <input type="date" id="fecha" name="fecha"><br>
        Plazas Disponibles: <input type="number" id="plazas" name="plazas"><br>
        Precio: <input type="text" id="precio" name="precio"><br>
        <button type="submit">Registrar Vuelo</button>
    </form>

    <h2>Registrar Hotel</h2>
    <form action="procesar_hotel.php" method="post" onsubmit="return validarHotel()">
        Nombre: <input type="text" id="nombre" name="nombre"><br>
        Ubicación: <input type="text" id="ubicacion" name="ubicacion"><br>
        Habitaciones Disponibles: <input type="number" id="habitaciones" name="habitaciones"><br>
        Tarifa por Noche: <input type="text" id="tarifa" name="tarifa"><br>
        <button type="submit">Registrar Hotel</button>
    </form>

    <h2>Lista de Vuelos y Hoteles</h2>

    <?php
    include 'mostrar_datos.php';
    ?>


    <?php include 'ver_reservas.php'; ?>


    <?php include 'hoteles_populares.php'; ?>

</body>

</html>