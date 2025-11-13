<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$dbname = 'avaliacao_db';
$user = 'postgres';
$password = '1234';

$input = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $input) {
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pdo->beginTransaction();
        
        $stmt = $pdo->prepare("INSERT INTO avaliacao (data_avaliacao) VALUES (NOW()) RETURNING id");
        $stmt->execute();
        $avaliacao_id = $stmt->fetchColumn();
        
        $stmt = $pdo->prepare("INSERT INTO resposta (avaliacao_id, pergunta_id, valor) VALUES (?, ?, ?)");
        
        foreach ($input['respostas'] as $pergunta_id => $valor) {
            $stmt->execute([$avaliacao_id, $pergunta_id, $valor]);
        }

        if (!empty($input['feedback'])) {
            $stmt = $pdo->prepare("INSERT INTO feedback (avaliacao_id, texto) VALUES (?, ?)");
            $stmt->execute([$avaliacao_id, $input['feedback']]);
        }
        
        $pdo->commit();
        
        echo json_encode([
            'success' => true,
            'message' => 'Avaliação salva com sucesso!'
        ]);
        
    } catch (Exception $e) {
        if (isset($pdo)) {
            $pdo->rollBack();
        }
        
        echo json_encode([
            'success' => false,
            'error' => 'Erro ao salvar: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Método não permitido ou dados inválidos'
    ]);
}
?>