<?php
namespace Soushi;

class Entry
{
    private $filename;
    private $document;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    function metadata()
    {
        return $this->document()->getYAML();
    }

    function content()
    {
        return $this->document()->getContent();
    }

    private function document()
    {
        if(is_null($this->document)) {
            $this->document = Parser::getInstance()->parse(file_get_contents($this->filename));
        }

        return $this->document;
    }
}
