<?php
$conn = new mysqli("localhost", "root", "witty", "alumnos");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = "SELECT * FROM municipios WHERE id_departamento = " . $_GET['id'];
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $municipios[] = $row;
}
echo json_encode($municipios);

$conn->close();
