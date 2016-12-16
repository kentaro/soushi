<?php
namespace Soushi;

class Template
{
    private $dirname;
    private $engine;

    function __construct($dirname)
    {
        $this->dirname = $dirname;
    }

    function engine()
    {
        if (is_null($this->engine)) {
            $this->engine = new \League\Plates\Engine($this->dirname);
        }

        return $this->engine;
    }

    function render($name, array $params = [])
    {
        return $this->engine()->render($name, $params);
    }
}
