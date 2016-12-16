<?php

namespace Soushi;

class Web
{
    private $path;
    private $template;
    private $aggregator;

    function __construct(string $path)
    {
        $this->path       = preg_replace('/^\//', '', $path);
        $this->template   = new Template(dirname(__FILE__).'/../templates');
        $this->aggregator = new Aggregator(dirname(__FILE__).'/../tests/assets');
    }

    function render(): string
    {
        $entry = $this->aggregator->fetch($this->path);
        return $entry->content();
    }
}
