<?php
$valor = $_POST['valor'];

function calcular_parcela($capital, $taxa, $parcelas) {
    $montante = $capital * pow((1 + $taxa), $parcelas);
    $valor_parcela = $montante / $parcelas;
    return number_format($valor_parcela, 2, ',', '.');
}

echo "Valor à vista: R$ " . number_format($valor, 2, ',', '.') . "<br><br>";

echo "24 vezes (2% ao mês): R$ " . calcular_parcela($valor, 0.02, 24) . " por parcela<br>";
echo "36 vezes (2,3% ao mês): R$ " . calcular_parcela($valor, 0.023, 36) . " por parcela<br>";
echo "48 vezes (2,6% ao mês): R$ " . calcular_parcela($valor, 0.026, 48) . " por parcela<br>";
echo "60 vezes (2,9% ao mês): R$ " . calcular_parcela($valor, 0.029, 60) . " por parcela<br>";
?>
