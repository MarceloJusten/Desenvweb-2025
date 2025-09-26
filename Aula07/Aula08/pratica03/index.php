    <?php 
      $SALARIO1 = 1000;
      $SALARIO2 = 2000;

      $SALARIO2 = $SALARIO1;
      $SALARIO2++;

      $SALARIO1 = $SALARIO1 *1.10;
      
       if ($SALARIO1 > $SALARIO2) {
        echo"“O Valor da variável 1 é maior que o valor da variável 2";
      } else if ($SALARIO1 < $SALARIO2) {
        echo"O Valor da variável 2 é maior que o valor da variável 1";
      }
      else {
        echo"Os valores são iguais";
      }
      ?>