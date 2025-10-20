<?php
$num = $_POST['numero'];

if ($num % 2 == 0) {
    echo "Valor divisível por 2";
} else {
    echo "O valor não é divisível por 2";
}
?>
