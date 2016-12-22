<?php

namespace Soushi\Generator;

class Web implements \Soushi\Generator
{
    use Base;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);
    }

    function generate()
    {
        $this->generateIndexPhp();
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
        if (!file_put_contents("{$this->dstDir}/index.php", $content)) {
            throw new \Soushi\Exception\File("failed to create index.php");
        }
    }
}
