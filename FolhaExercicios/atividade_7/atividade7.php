<?php
$valor_vista = $_POST['valor_vista'];
$parcelas = $_POST['parcelas'];
$valor_parcela = $_POST['valor_parcela'];

$total_financiamento = $parcelas * $valor_parcela;

$juros = $total_financiamento - $valor_vista;

echo "Valor total pago no financiamento: R$ " . number_format($total_financiamento, 2, ',', '.') . "<br>";
echo "Valor gasto apenas com juros: R$ " . number_format($juros, 2, ',', '.') . "<br>";
?>
