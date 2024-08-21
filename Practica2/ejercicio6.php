<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card m-auto mt-5">
            <form action="ejercicio6.php" method="post">
                <div class="row m-5 justify-content-center">
                    <div class="col-md-4">
                        <label for="">Nombre empleado:</label>
                        <input type="text" class="form-control" name="txtNombre">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cantidad vendida:</label>
                        <input type="text" class="form-control" name="txtCantidad">
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4">
                        <button class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>

<?php
$nombre = $_POST["txtNombre"];
$cantidad = $_POST["txtCantidad"];
$comision = 0;
$salario = 850;

if ($cantidad >= 10000 && $cantidad < 12000) {
    $comision = 10000 * 0.03;
} else if ($cantidad >= 12000 && $cantidad < 15000) {
    $comision = 12000 * 0.05;
} else if ($cantidad >= 15000) {
    $comision = 15000 * 0.1;
} else {
    $comision = 0;
}

echo "<br><br>";
echo "Empleado: $nombre <br>";
echo "Comision obtenida: $comision <br>";
echo "Total pago: " . ($salario + $comision);



?>