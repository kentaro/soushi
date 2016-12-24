<?php

namespace Soushi\Generator;

class Build implements \Soushi\Generator
{
    use Base;

    private $template;
    private $aggregator;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);

        $config = \Soushi\Config::loadFile("config.php");
        $this->template   = new \Soushi\Template($config->templateDir);
        $this->aggregator = new \Soushi\Aggregator($config->sourceDir);
    }

    function generate()
    {
        $this->generatePages();
        $this->generateAssets();
    }

    private function generatePages()
    {
        foreach ($this->aggregator->pages() as $page) {
            $path = "{$this->dstDir}/{$page->path()}.html";
            $html = $this->template->render(
                $page->template(),
                array_merge(
                    $page->metadata(),
                    [
                        "content" => $page->content(),
                    ]
                )
            );
            $this->filePutContentsDeeply($path, $html);
        }
    }

    private function generateAssets()
    {
        foreach ($this->aggregator->assets() as $asset) {
            $path     = "{$this->dstDir}/{$asset->pathWithExtension()}";
            $contents = file_get_contents($asset->absolutePath());
            $this->filePutContentsDeeply($path, $contents);
        }
    }
}
