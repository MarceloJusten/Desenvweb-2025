<?php
session_start();

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['inicio_sessao'] = time();
$_SESSION['ultima_requisicao'] = time();

header('Location: acesso.php');
exit();
