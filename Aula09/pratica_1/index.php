<?php
$notas = array(7,4,6,10,1);

$faltas = array(1,1,1,0,1);

function mediaNotas($notas){
    $soma = array_sum($notas);
    $quantidade = count($notas);
    return $soma / $quantidade;
}

$media = mediaNotas($notas);

echo "A média foi: $media";
?>
