<?php
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    echo "Acesso negado. Faça o <a href='login.html'>login</a>.";
    exit();
}

$agora = time();
$ultima_requisicao = $_SESSION['ultima_requisicao'] ?? $agora;
$inicio_sessao = $_SESSION['inicio_sessao'] ?? $agora;


$_SESSION['ultima_requisicao'] = $agora;

$tempo_sessao = $agora - $inicio_sessao;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso</title>
</head>
<body>
    <h2>Dados da Sessão</h2>
    <p><strong>Login:</strong> <?= htmlspecialchars($_SESSION['login']) ?></p>
    <p><strong>Senha:</strong> <?= htmlspecialchars($_SESSION['senha']) ?></p>
    <p><strong>Início da Sessão:</strong> <?= date('d/m/Y H:i:s', $inicio_sessao) ?></p>
    <p><strong>Última Requisição:</strong> <?= date('d/m/Y H:i:s', $ultima_requisicao) ?></p>
    <p><strong>Tempo de Sessão:</strong> <?= gmdate('H:i:s', $tempo_sessao) ?></p>

    <br>
</body>
</html>
