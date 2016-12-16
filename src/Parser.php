<?php
namespace Soushi;

class Parser
{
    private static $instance;
    private $parser;

    static function getInstance(): Parser
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    function __construct()
    {
        $this->parser = new \Mni\FrontYAML\Parser();
    }

    function parse($content): \Mni\FrontYAML\Document
    {
        return $this->parser->parse($content);
    }
}
