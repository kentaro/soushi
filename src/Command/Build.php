<?php

namespace Soushi\Command;

class Build implements \Soushi\Command
{
    use Base;

    private $config;
    private $template;
    private $aggregator;

    function __construct(string $dstDir)
    {
        $this->prepareDirectory($dstDir);

        $this->config     = \Soushi\Config::loadFile("config.php");
        $this->template   = new \Soushi\Template($this->config->template_dir());
        $this->aggregator = new \Soushi\Aggregator($this->config->source_dir());
    }

    function execute()
    {
        $this->generatePages();
        $this->generateAssets();
    }

    private function generatePages()
    {
        foreach ($this->aggregator->pages() as $page) {
            if ($page->isIndexPage()) {
                $path = "{$this->dstDir}/{$page->path()}.html";
            } else {
                $path = "{$this->dstDir}/{$page->path()}/index.html";
            }
            $html = $this->template->render(
                $page->template(),
                array_merge(
                    $page->metadata(),
                    [
                        "config"  => $this->config,
                        "pages"   => $this->aggregator->pages(),
                        "page"    => $page,
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
