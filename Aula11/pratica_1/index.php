    <?php 
        $connectionString = "host=localhost
                             port=5432
                             dbname=local
                             user=postgres
                             password=unidavi";

        $connection =pg_connect($connectionString);

        if ($connection) {
            echo "Database conectado com sucesso!<br>" ;

            $result = pg_query($connection,
                               "SELECT COUNT(*) AS QTD FROM TBPESSOA");

            if ($result){
                $row = pg_fetch_assoc ($result);
                echo "Quantidade de dados na tabela". $row['qtd'];
            } else{
                echo "Erro ao executar a consulta";
            }                  
        } else {
            echo "Erro ao conectar o database";
        }

        //INSERIR

        // $aDadosPessoa = array ('João',
        //                        'Silva',
        //                        'joao.silva@gmail.com',
        //                        '123456',
        //                        'São Paulo',
        //                        'SP' );

        // $resultInsert = pg_query_params($connection,
        //                                 'INSERT INTO TBPESSOA(pesnome,
        //                                                       pessobrenome,
        //                                                       pesemail,
        //                                                       pespassword,
        //                                                       pescidade,
        //                                                       pesestado)
        //                                 VALUES ($1, $2, $3, $4, $5, $6)', $aDadosPessoa);
        // if ($resultInsert) {
        //     echo "<br> Dados inseridos com sucesso!";
        // }                                                       
      ?>
