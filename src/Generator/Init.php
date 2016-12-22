<?php

namespace Soushi\Generator;

class Init implements \Soushi\Generator
{
    use Base;

    function __construct(string $dstDir = ".")
    {
        $this->prepareDirectory($dstDir);
    }

    function generate()
    {
        $this->generateGitIgnore();
        $this->generateDirectories();
        $this->generateConfigPhp();
    }

    private function generateGitIgnore()
    {
        $content = <<<'EOS'
/vendor
/build
EOS;
        if (!file_put_contents("{$this->dstDir}/.gitignore", $content)) {
            throw new \Soushi\Exception\File("failed to create .gitignore");
        }
    }

    private function generateDirectories()
    {
        $dirs = ["public", "source", "templates", "build"];
        foreach ($dirs as $dir) {
            if (!mkdir($this->dstDir . "/{$dir}", 0755)) {
                throw new \Soushi\Exception\File("failed to create {$dir}");
            }
        }
    }

    private function generateConfigPhp()
    {
        $content = <<<'EOS'
return [
    "template_dir" => dirname(__FILE__) . "/../templates",
    "source_dir"   => dirname(__FILE__) . "/../source",
];
EOS;
        if (!file_put_contents("{$this->dstDir}/config.php", $content)) {
            throw new \Soushi\Exception\File("failed to create config.php");
        }
    }
}
