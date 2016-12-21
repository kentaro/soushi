<?php

require_once dirname(__FILE__) . "/../vendor/autoload.php";

// Replace the dirs below with your own ones.
$config = new Soushi\Config([
    "template_dir" => dirname(__FILE__) . "/../tests/assets/templates",
    "source_dir"   => dirname(__FILE__) . "/../tests/assets/source",
]);

$web = new Soushi\Web($config);
echo $web->dispatch($_SERVER["REQUEST_URI"]);
