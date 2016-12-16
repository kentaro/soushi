<?php
namespace Soushi;

class Entry
{
    private $filename;
    private $parser;
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

    private function parser()
    {
        if (is_null($this->parser)) {
            $this->parser = new \Mni\FrontYAML\Parser();
        }

        return $this->parser;
    }

    private function document()
    {
        if(is_null($this->document)) {
            $this->document = $this->parser()->parse(file_get_contents($this->filename));
        }

        return $this->document;
    }
}
