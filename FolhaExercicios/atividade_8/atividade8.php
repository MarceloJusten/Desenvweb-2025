<?php
$valor = $_POST['valor'];

function calcular_parcelas($valor, $taxa, $parcelas) {
    $valor_final = $valor * (1 + ($taxa * $parcelas));
    $valor_parcela = $valor_final / $parcelas;
    return number_format($valor_parcela, 2, ',', '.');
}

echo "Valor à vista: R$ " . number_format($valor, 2, ',', '.') . "<br><br>";

echo "24 vezes (1,5% ao mês): R$ " . calcular_parcelas($valor, 0.015, 24) . " por parcela<br>";
echo "36 vezes (2,0% ao mês): R$ " . calcular_parcelas($valor, 0.020, 36) . " por parcela<br>";
echo "48 vezes (2,5% ao mês): R$ " . calcular_parcelas($valor, 0.025, 48) . " por parcela<br>";
echo "60 vezes (3,0% ao mês): R$ " . calcular_parcelas($valor, 0.030, 60) . " por parcela<br>";
?>
