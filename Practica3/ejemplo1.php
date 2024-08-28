<?php
//Mostrar la suma de nuemeros del 1 al 100 usando bucle while


//Contador
$i = 1;
$suma = 0;

while ($i <= 100) {
    //echo $i . "<br>";
    $suma += $i;
    //Incrementar contador
    $i++;
}

echo "La suma de todos los numeros es: $suma";
