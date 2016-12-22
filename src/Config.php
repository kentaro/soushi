<?php

namespace Soushi;

class Config
{
    public $templateDir;
    public $sourceDir;

    static function loadFile(string $filename)
    {
        $config = require $filename;
        return new Config($config);
    }

    function __construct(array $config)
    {
        $this->build($config);
    }

    private function build(array $config)
    {
        $this->templateDir = $config["template_dir"] ??
                             dirname(__FILE__) . "/../templates/builtins";

        if (is_null($this->sourceDir = $config["source_dir"])) {
            throw new InvalidArgumentException("`source_dir` is required");
        }
    }
}
