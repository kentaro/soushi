<?php

namespace Soushi;

class Web
{
    private $template;
    private $aggregator;

    function __construct(Config $config)
    {
        $this->template   = new Template($config->templateDir);
        $this->aggregator = new Aggregator($config->sourceDir);
    }

    function dispatch(string $path): string
    {
        try {
            $page = $this->aggregator->fetch(preg_replace('/^\//', '', $path));
        } catch (Exception\PageNotFound $e) {
            return $this->handle404($e);
        } catch (Throwable $e) {
            return $this->handle500($e);
        }

        try {
            $html = $this->template->render($page->template(), array_merge(
                    $page->metadata(),
                    [
                        "content" => $page->content()
                    ]
                )
            );
        } catch (Throwable $e) {
            return $this->handle500($e);
        }

        return $html;
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
