<?php
require_once "model/pessoa.php";

use app\model\Pessoa;

function salvarPessoasEmArray($pessoas) {
    $dados = [];
    
    foreach ($pessoas as $pessoa) {
        $dados[] = json_decode($pessoa->toJson(), true);
    }
    
    $jsonData = json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents('pessoas_array.json', $jsonData);
}

$pessoas = [];

$pessoa1 = new Pessoa();
$pessoa1->setNome("Marcelo");
$pessoa1->setSobreNome("Justen");
$pessoa1->setDataNascimento(new DateTime("2005-02-03"));
$pessoa1->setCpfCnpj("123.456.789-00");
$pessoas[] = $pessoa1;

$pessoa2 = new Pessoa();
$pessoa2->setNome("Ana");
$pessoa2->setSobreNome("Silva");
$pessoa2->setDataNascimento(new DateTime("1990-05-15"));
$pessoa2->setCpfCnpj("987.654.321-00");
$pessoas[] = $pessoa2;

$pessoa3 = new Pessoa();
$pessoa3->setNome("Carlos");
$pessoa3->setSobreNome("Santos");
$pessoa3->setDataNascimento(new DateTime("1985-08-20"));
$pessoas[] = $pessoa3;

foreach ($pessoas as $index => $pessoa) {
    echo "Pessoa " . ($index + 1) . ": " . $pessoa->getNomeCompleto() . "<br>";
    echo "Idade: " . $pessoa->getIdade() . "<br>";
    
    $nomeArquivo = "pessoa_" . ($index + 1) . ".json";
    if ($pessoa->salvarEmArquivo($nomeArquivo)) {
        echo "Salvo em: " . $nomeArquivo . "<br>";
    }
    echo "<br>";
}

if (salvarPessoasEmArray($pessoas)) {
    echo "Array de pessoas salvo em: pessoas_array.json<br>";
}
?>