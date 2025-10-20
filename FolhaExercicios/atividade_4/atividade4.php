<?php
$lado_a = $_POST['lado_a'];
$lado_b = $_POST['lado_b'];

$area = $lado_a * $lado_b;

if ($area > 10) {
    echo "<h1>A área do retângulo de lados $lado_a e $lado_b metros é $area metros quadrados.</h1>";
} else {
    echo "<h3>A área do retângulo de lados $lado_a e $lado_b metros é $area metros quadrados.</h3>";
}
?>
