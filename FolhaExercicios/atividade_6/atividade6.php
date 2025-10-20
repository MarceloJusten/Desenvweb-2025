<?php
$saldo = 50.00;

$valor_maca = $_POST['preco_maca'] * $_POST['qtd_maca'];
$valor_melancia = $_POST['preco_melancia'] * $_POST['qtd_melancia'];
$valor_laranja = $_POST['preco_laranja'] * $_POST['qtd_laranja'];
$valor_repolho = $_POST['preco_repolho'] * $_POST['qtd_repolho'];
$valor_cenoura = $_POST['preco_cenoura'] * $_POST['qtd_cenoura'];
$valor_batatinha = $_POST['preco_batatinha'] * $_POST['qtd_batatinha'];

$total = $valor_maca + $valor_melancia + $valor_laranja + $valor_repolho + $valor_cenoura + $valor_batatinha;

echo "O valor total da compra é R$ " . number_format($total, 2, ',', '.') . "<br>";

if ($total < $saldo) {
    $restante = $saldo - $total;
    echo "<span style='color:blue'>Dinheiro suficiente! Joãozinho ainda pode gastar R$ " . number_format($restante, 2, ',', '.') . "</span>";
} elseif ($total > $saldo) {
    $faltante = $total - $saldo;
    echo "<span style='color:red'>Dinheiro insuficiente! Joãozinho precisa de mais R$ " . number_format($faltante, 2, ',', '.') . "</span>";
} else {
    echo "<span style='color:green'>Saldo exatamente utilizado! Joãozinho esgotou os R$ 50,00 disponíveis.</span>";
}
?>
