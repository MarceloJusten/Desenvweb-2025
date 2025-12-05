<?php
function lerArquivoJson($nomeArquivo) {
    if (file_exists($nomeArquivo)) {
        $conteudo = file_get_contents($nomeArquivo);
        return json_decode($conteudo, true);
    }
    return null;
}

$arquivos = ['pessoa.json', 'pessoas_array.json'];

foreach ($arquivos as $arquivo) {
    if (file_exists($arquivo)) {
        echo "<h2>Arquivo: $arquivo</h2>";
        $dados = lerArquivoJson($arquivo);
        
        if (is_array($dados)) {
            echo "<pre>";
            print_r($dados);
            echo "</pre>";
        } else {
            echo "Erro ao ler arquivo JSON.<br>";
        }
        echo "<hr>";
    }
}

echo "<a href='index.php'>Voltar</a>";
?>