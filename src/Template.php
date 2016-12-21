<?php

namespace Soushi;

class Template
{
    private $dirname;
    private $engine;

    function __construct(string $dirname)
    {
        $this->dirname = $dirname;
    }

    function engine(): \League\Plates\Engine
    {
        if (is_null($this->engine)) {
            $this->engine = new \League\Plates\Engine($this->dirname);
        }

        return $this->engine;
    }

    function render(string $name, array $params = [])
    {
        return $this->engine()->render($name, $params);
    }
}
