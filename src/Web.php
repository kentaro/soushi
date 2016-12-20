<?php

namespace Soushi;

class Web
{
    private $template;
    private $aggregator;

    function __construct(Config $config)
    {
        $this->template   = new Template($config->templateDir);
        $this->aggregator = new Aggregator($config->entryDir);
    }

    function dispatch(string $path): string
    {
        $entry = $this->aggregator->fetch(preg_replace('/^\//', '', $path));
        return $this->template->render('index', array_merge(
                $entry->metadata(),
                [
                    "content" => $entry->content()
                ]
            )
        );
    }
}
