    <?php 
    $SALARIO1 = 1000;
    $SALARIO2 = 2000;

    $SALARIO2 = $SALARIO1;
    $SALARIO2++;

    $SALARIO1 = $SALARIO1 *1.10;
     
    $x = 1;

    for ($x = 1; $x <= 100; $x++) {
        $SALARIO1++;
        if ($x == 50) {
            break;
        }
    }
    echo "$SALARIO1 esse é o salario <br>";

    if ($SALARIO1 > $SALARIO2) {
        echo"O Salário 1 é maior que o valor da Salário 2 <br>";
    }
      ?>