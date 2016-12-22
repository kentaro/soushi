<?php

require_once dirname(__FILE__) . "/../vendor/autoload.php";
$config = Soushi\Config::loadFile(dirname(__FILE__) . "/../config.php");
$web    = new Soushi\Web($config);
echo $web->dispatch($_SERVER["REQUEST_URI"]);
