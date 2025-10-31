<?php
    require_once "model\pessoa.php";
    $pessoa = new pessoa;

    $pessoa->setName("Marcelo");
    $pessoa->setSobreNome("Justen");
    $dataNascimento = new DateTime("2005-02-03");
    $pessoa->setDataNascimento($dataNascimento);

    echo "Pessoa".$pessoa->getNomeCompleto(). "<br>";
    echo "idade ".$pessoa->getIdade()."<br>";

?>