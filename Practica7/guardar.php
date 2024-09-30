<?php
$conn = new mysqli("localhost", "root", "witty", "alumnos");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    // Recoger los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $genero = $_POST['genero'];

    // Validar que los campos no estén vacíos
    if (empty($nombres) || empty($apellidos) || empty($departamento) || empty($municipio) || empty($genero)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Preparar la consulta SQL para insertar los datos
        $query = "INSERT INTO alumnos (nombres, apellidos, departamento_id, municipio_id, genero) 
                  VALUES ('$nombres', '$apellidos', '$departamento', '$municipio', '$genero')";

        // Ejecutar la consulta
        if ($conn->query($query) === TRUE) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "No se recibieron datos.";
}

// Cerrar la conexión
$conn->close();
