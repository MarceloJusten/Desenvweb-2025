<?php
$notas = array(7,4,6,10,1);
$faltas = array(1,1,1,0,1);

function mediaNotas($notas){
    $soma = array_sum($notas);
    $quantidade = count($notas);
    return $soma / $quantidade;
}

function statusNota($media){
    return $media >= 7 ? "Aprovado por Nota" : "Reprovado por Nota";
}

function frequencia($faltas){
    $total = count($faltas);
    $faltasTotais = array_sum($faltas);
    return (($total - $faltasTotais) / $total) * 100;
}

function statusFrequencia($frequencia){
    return $frequencia >= 70 ? "Aprovado por Frequência" : "Reprovado por Frequência";
}

$media = mediaNotas($notas);
$statusNota = statusNota($media);

$frequencia = frequencia($faltas);
$statusFrequencia = statusFrequencia($frequencia);

echo "Média: " . number_format($media, 2) . "<br>";
echo $statusNota . "<br>";
echo "Frequência: " . number_format($frequencia, 2) . "%<br>";
echo $statusFrequencia . "<br>";
?>
