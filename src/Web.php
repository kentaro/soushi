<?php

namespace Soushi;

class Web
{
    private $config;
    private $template;
    private $aggregator;

    function __construct(Config $config)
    {
        $this->config     = $config;
        $this->template   = new Template($config->template_dir());
        $this->aggregator = new Aggregator($config->source_dir());
    }

    function dispatch(string $path): string
    {
        try {
            $page = $this->aggregator->fetch($this->normalizePath($path));
        } catch (Exception\PageNotFound $e) {
            return $this->handle404($e);
        } catch (Throwable $e) {
            return $this->handle500($e);
        }

        try {
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
        } catch (Throwable $e) {
            return $this->handle500($e);
        }

        return $html;
    }

    function normalizePath(string $path): string
    {
        return preg_replace("/^\/(index\.php\/?)?/", "", $path);
    }

    private function handle404(Exception\PageNotFound $e)
    {
        http_response_code(404);
        return $e->getMessage();
    }

    private function handle500(Throwable $e)
    {
        http_response_code(500);
        return $e->getMessage();
    }
}
