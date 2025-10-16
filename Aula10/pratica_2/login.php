<?php
session_start();

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';
$time  = $_POST['time'] ?? '';

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['time']  = $time;
$_SESSION['inicio_sessao'] = time(); 
$_SESSION['ultima_requisicao'] = time();

header('Location: acesso.php');
exit();
