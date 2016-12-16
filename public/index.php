<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';
$web = new Soushi\Web($_SERVER['REQUEST_URI']);
echo $web->render();
