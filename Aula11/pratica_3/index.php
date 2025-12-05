<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';
    $cidade = $_POST['city'] ?? '';
    $estado = $_POST['estado'] ?? '';

    if (!empty($nome) && !empty($sobrenome) && !empty($email) && 
        !empty($senha) && !empty($cidade) && !empty($estado)) {
        
        $pessoa = [
            'pesnome' => $nome,
            'pessobrenome' => $sobrenome,
            'pesemail' => $email,
            'pespassword' => $senha,
            'pescidade' => $cidade,
            'pesestado' => $estado,
            'data_cadastro' => date('Y-m-d H:i:s')
        ];
        
        $arquivo_json = 'pessoas.json';
        
        if (file_exists($arquivo_json)) {
            $dados_existentes = file_get_contents($arquivo_json);
            $pessoas = json_decode($dados_existentes, true);
            
            if (!is_array($pessoas)) {
                $pessoas = [];
            }
        } else {
            $pessoas = [];
        }
        
        $pessoas[] = $pessoa;
        
        $json_data = json_encode($pessoas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        if (file_put_contents($arquivo_json, $json_data)) {
            $mensagem = "Dados salvos com sucesso no arquivo JSON!";
            
            $total_pessoas = count($pessoas);
            $mensagem .= "<br>Total de pessoas cadastradas: $total_pessoas";
            
            if ($total_pessoas >= 10) {
                $mensagem .= "<br>Meta atingida: 10 pessoas cadastradas!";
            }
        } else {
            $mensagem = "Erro ao salvar dados no arquivo.";
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos do formulário.";
    }
}

$total_cadastrados = 0;
$arquivo_json = 'pessoas.json';
if (file_exists($arquivo_json)) {
    $dados_existentes = file_get_contents($arquivo_json);
    $pessoas = json_decode($dados_existentes, true);
    
    if (is_array($pessoas)) {
        $total_cadastrados = count($pessoas);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoas</title>
</head>
<body>
    <h1>Cadastro de Pessoas</h1>
    
    <?php if(isset($mensagem)): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>
    
    <form method="post" action="">
        <label for="name">Nome</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="sobrenome">Sobrenome</label><br>
        <input type="text" id="sobrenome" name="sobrenome" required><br>
        
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Senha</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="city">Cidade</label><br>
        <input type="text" id="city" name="city" required><br>
        
        <label for="estado">Estado</label><br>
        <input type="text" id="estado" name="estado" required maxlength="2"><br>
        
        <button type="submit">Salvar</button>
    </form>
    
    <br>
    <a href="visualizar.php">Visualizar Dados</a>
    <a href="limpar.php">Limpar Arquivo</a>
    
    <p>Pessoas no arquivo: <?php echo $total_cadastrados; ?></p>
</body>
</html>