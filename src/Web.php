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
        $page = $this->aggregator->fetch(preg_replace('/^\//', '', $path));
        return $this->template->render($page->template(), array_merge(
                $page->metadata(),
                [
                    "content" => $page->content()
                ]
            )
        );
    }
}
