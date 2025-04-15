<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_POST['agregar'])) {
    $paquete = $_POST['paquete'];
    $_SESSION['carrito'][] = $paquete;
}

if (isset($_POST['eliminar'])) {
    $indice = $_POST['indice'];
    unset($_SESSION['carrito'][$indice]); 
    $_SESSION['carrito'] = array_values($_SESSION['carrito']); 
}

if (isset($_POST['vaciar'])) {
    $_SESSION['carrito'] = []; 
}

if (!empty($_SESSION['carrito'])) {
    echo "<ul>";
    foreach ($_SESSION['carrito'] as $indice => $paquete) {
        echo "<li>$paquete 
            <form method='post' style='display:inline;'>
                <input type='hidden' name='indice' value='$indice'>
                <button type='submit' name='eliminar'>Eliminar</button>
            </form>
        </li>";
    }
    echo "</ul>";

    echo "<form method='post'>
            <button type='submit' name='vaciar'>Vaciar Carrito</button>
          </form>";
} else {
    echo "<p>El carrito está vacío.</p>";
}
?>
