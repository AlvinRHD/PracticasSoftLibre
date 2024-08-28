<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 40px;
            height: 40px;
            text-align: center;
        }

        .black {
            background-color: black;
            color: white;
        }

        .white {
            background-color: white;
        }
    </style>
</body>

</html>

<form method="POST">
    Filas: <input type="number" name="filas" required><br>
    Columnas: <input type="number" name="columnas" required><br>
    <input type="submit" value="generarTablero">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filas = $_POST['filas'];
    $columnas = $_POST['columnas'];

    echo "<table border='1'>";
    for ($i = 1; $i <= $filas; $i++) {
        echo "<tr>";
        for ($d = 1; $d <= $columnas; $d++) {
            $class = (($i + $d) % 2 == 0) ? 'white' : 'black';
            echo "<td class='$class'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>

</html>