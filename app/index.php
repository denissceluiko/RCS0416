<?php 

$loader = require __DIR__ . '/vendor/autoload.php';

use App\Core\Request;

$response = (new Request())->handle();

?>