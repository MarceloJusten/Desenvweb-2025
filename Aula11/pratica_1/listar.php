<?php
$connectionString = "host=localhost 
                    port=5432
                    dbname=local 
                    user=postgres
                    password=unidavi";

$connection = pg_connect($connectionString);

$result = pg_query($connection, 'SELECT * FROM TBPESSOA');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
</head>
<body>
    <h2>Registros da Tabela TBPESSOA</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>

        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['pesnome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pessobrenome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesemail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pescidade']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pesestado']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
