<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Árvore Recursiva</title>
</head>
<body>
    <?php
    $pastas = array(
        "bsn" => array(
            "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
            "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
        )
    );

    function mostrar($itens) {
        echo "<ul>";
        foreach ($itens as $nome => $valor) {
            if (is_array($valor)) {
                echo "<li>$nome";
                mostrar($valor);
                echo "</li>";
            } else {
                echo "<li>$valor</li>";
            }
        }
        echo "</ul>";
    }

    mostrar($pastas);
    ?> 
</body>
</html>
