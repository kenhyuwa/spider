<?php
 
// Require composer autoload
require __DIR__ . "/../vendor/autoload.php";
 
// Alias you class for easy usage
use Kenhyuwa\Spider\Html\Spider;
 
// Instantiate your class
$var = new Spider();
 
// Call a class method
echo $var->header('','');