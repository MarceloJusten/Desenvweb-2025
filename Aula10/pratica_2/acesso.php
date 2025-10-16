<?php
session_start();

if (empty($_SESSION['login']) || empty($_SESSION['time'])) {
    echo "<script>alert('Dados da sessão foram perdidos. Faça login novamente.');</script>";
    echo "<p><a href='login.html'>Voltar para o login</a></p>";
    session_destroy();
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
    <p><strong>Time Favorito:</strong> <?= htmlspecialchars($_SESSION['time']) ?></p>
    <p><strong>Início da Sessão:</strong> <?= date('d/m/Y H:i:s', $inicio_sessao) ?></p>
    <p><strong>Última Requisição:</strong> <?= date('d/m/Y H:i:s', $ultima_requisicao) ?></p>
    <p><strong>Tempo de Sessão:</strong> <?= gmdate('H:i:s', $tempo_sessao) ?></p>

    <br>
    <a href="acesso.php">Atualizar</a> |
    <a href="logout.php">Encerrar Sessão</a>
</body>
</html>
