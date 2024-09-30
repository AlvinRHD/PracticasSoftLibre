<?php
$conn = new mysqli("localhost", "root", "witty", "alumnos");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $municipios[] = $row;
    }
    var_dump($municipios); // Añadir para depuración
    echo json_encode($municipios);
}


$id_departamento = $_GET['id'];
$query = "SELECT * FROM municipios WHERE id_departamento = " . intval($id_departamento);
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $municipios[] = $row;
    }
    echo json_encode($municipios);
} else {
    echo json_encode([]);  // Devolver un array vacío si no hay resultados
}
