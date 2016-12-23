<?php

namespace Soushi\Generator;

class Init implements \Soushi\Generator
{
    use Base;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);
    }

    function generate()
    {
        $this->generateGitIgnore();
        $this->generateDirectories();
        $this->generateConfigPhp();
        $this->generateIndexPhp();
    }

    private function generateGitIgnore()
    {
        $content = <<<'EOS'
/vendor
composer.lock

/build
/public
/tmp
config.php
EOS;
        if (!file_put_contents("{$this->dstDir}/.gitignore", $content)) {
            throw new \Soushi\Exception\File("failed to create .gitignore");
        }
    }

    private function generateDirectories()
    {
        $dirs = ["public", "source", "templates", "build"];
        foreach ($dirs as $dir) {
            $path = $this->dstDir . "/{$dir}";
            if (!file_exists($path) && !mkdir($path, 0755)) {
                throw new \Soushi\Exception\File("failed to create {$dir}");
            }
        }
    }

    private function generateConfigPhp()
    {
        $content = <<<'EOS'
<?php
return [
    "template_dir" => dirname(__FILE__) . "/templates",
    "source_dir"   => dirname(__FILE__) . "/source",
];
EOS;
        $path = "{$this->dstDir}/config.php";
        if (
            !file_exists($path) &&
            !file_put_contents($path, $content)
        ) {
            throw new \Soushi\Exception\File("failed to create config.php");
        }
    }

    private function generateIndexPhp()
    {
        $content = <<<'EOS'
<?php

require_once dirname(__FILE__) . "/../vendor/autoload.php";

$config = Soushi\Config::loadFile(dirname(__FILE__) . "/../config.php");
$web    = new Soushi\Web($config);
echo $web->dispatch($_SERVER["REQUEST_URI"]);
EOS;
        $path = "{$this->dstDir}/public/index.php";
        if (
            !file_exists($path) &&
            !file_put_contents($path, $content)
        ) {
            throw new \Soushi\Exception\File("failed to create index.php");
        }
    }
}
