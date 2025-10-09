<?php

function calcularValorFinal($valor, $desconto) {
    if (!is_numeric($valor) || !is_numeric($desconto)) {
        throw new Exception("Parâmetros inválidos.");
    }

    if ($valor < 0 || $desconto < 0) {
        throw new Exception("Valor e desconto devem ser positivos.");
    }

    if ($desconto > $valor) {
        throw new Exception("Desconto não pode ser maior que o valor.");
    }

    return $valor - $desconto;
}

try {
    if (!isset($_REQUEST['valor']) || !isset($_REQUEST['desconto'])) {
        throw new Exception("Parâmetros 'valor' e 'desconto' são obrigatórios.");
    }

    $valor = $_REQUEST['valor'];
    $desconto = $_REQUEST['desconto'];

    $valorFinal = calcularValorFinal($valor, $desconto);
    echo "Valor final com desconto: R$ " . number_format($valorFinal, 2, ',', '.');

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

?>
