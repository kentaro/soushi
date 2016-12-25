<?php

namespace Soushi;

class Config
{
    private $config;

    static function loadFile(string $filename)
    {
        $config = require $filename;
        return new Config($config);
    }

    function __construct(array $config)
    {
        $this->build($config);
    }

    function __call($name, $args = [])
    {
        return $this->config[$name];
    }

    private function build(array $config)
    {
        $config["template_dir"] = $config["template_dir"] ??
                                  dirname(__FILE__, 2) . "/templates";
        $config["source_dir"]   = $config["source_dir"] ??
                                  dirname(__FILE__, 2) . "/source";

        $this->config = $config;
    }
}
