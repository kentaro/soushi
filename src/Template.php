<?php
namespace Soushi;

class Template
{
    private $dirname;
    private $ext;
    private $engine;

    function __construct($dirname, $ext = 'php')
    {
        $this->dirname = $dirname;
        $this->ext     = $ext;
    }

    function engine()
    {
        if (is_null($this->engine)) {
            $this->engine = new \League\Plates\Engine($this->dirname, $this->ext);
        }

        return $this->engine;
    }

    function render($name, array $params = [])
    {
        return $this->engine()->render($name, $params);
    }
}
