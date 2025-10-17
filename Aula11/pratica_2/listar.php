<?php
    $conn = pg_connect("host=localhost 
                         port=5432 
                         dbname=local 
                         user=postgres 
                         password=unidavi");                  
    $busca = $_GET['busca'] ?? '';

    $sql = $busca ? "SELECT * 
                       FROM TBPESSOA 
                      WHERE pesnome ILIKE '%$busca%'" : "SELECT * FROM TBPESSOA";
    $result = pg_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Prática 2</title>
</head>
<body>
    <form method="GET">
        Buscar por Nome: <input type="text" name="busca" value="<?= htmlspecialchars($busca) ?>">
        <button type="submit">Pesquisar</button>
        <a href="listar.php"><button type="button">Limpar</button></a>
    </form>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
        <?php while ($row = pg_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['pesnome']) ?></td>
                <td><?= htmlspecialchars($row['pessobrenome']) ?></td>
                <td><?= htmlspecialchars($row['pesemail']) ?></td>
                <td><?= htmlspecialchars($row['pescidade']) ?></td>
                <td><?= htmlspecialchars($row['pesestado']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
