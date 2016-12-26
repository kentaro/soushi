<?php

namespace Soushi\Command;

class Init implements \Soushi\Command
{
    use Base;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);
    }

    function execute()
    {
        $this->generateGitIgnore();
        $this->generateDirectories();
        $this->generateConfigPhp();
        $this->generateIndexPhp();
        $this->generateDotHtaccess();
    }

    private function generateGitIgnore()
    {
        $content = <<<'EOS'
/vendor
composer.lock

/build
/public
/tmp
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
    "site_title"   => "My Homepage",
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

require_once dirname(__FILE__, 2) . "/vendor/autoload.php";

$config = Soushi\Config::loadFile(dirname(__FILE__, 2) . "/config.php");
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

    private function generateDotHtaccess()
    {
        $content = <<<'EOS'
RewriteEngine On
RewriteBase   /
RewriteRule   ^index\.php$ - [L]
RewriteCond   %{REQUEST_FILENAME} !-f
RewriteCond   %{REQUEST_FILENAME} !-d
RewriteRule   . /index.php [L]
EOS;
        $path = "{$this->dstDir}/public/.htaccess";
        if (
            !file_exists($path) &&
            !file_put_contents($path, $content)
        ) {
            throw new \Soushi\Exception\File("failed to create .htaccess");
        }
    }
}
