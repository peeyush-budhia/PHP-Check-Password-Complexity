<?php
require './class.CheckPasswordComplexity.php';

// Create object
$PC  = new CheckPasswordComplexity();

// Check the complexity
echo $PC->checkPassword('password');
?>
