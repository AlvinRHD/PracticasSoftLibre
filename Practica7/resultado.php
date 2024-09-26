<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Nombre: " . $_POST['nombres'] . " " . $_POST['apellidos'] . "</br>";
    echo "Departamento id: " . $_POST['departamento'] . "</br>";
    echo "Municipio id: " . $_POST['municipio'] . "</br>";
    echo "Genero: " . $_POST['genero'] . "</br>";
} else {
    echo "No se recibieron los datos";
}
