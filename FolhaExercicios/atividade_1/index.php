<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v1 = $_POST["v1"];
    $v2 = $_POST["v2"];
    $v3 = $_POST["v3"];

    $soma = $v1 + $v2 + $v3;

    // Verificações em ordem de prioridade
    if ($v1 > 10) {
        echo "<p style='color: blue;'>Resultado: $soma</p>";
    } elseif ($v2 < $v3) {
        echo "<p style='color: green;'>Resultado: $soma</p>";
    } elseif ($v3 < $v1 && $v3 < $v2) {
        echo "<p style='color: red;'>Resultado: $soma</p>";
    } else {
        echo "<p>Resultado: $soma</p>";
    }
}
?>