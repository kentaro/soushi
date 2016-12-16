<?php
namespace Soushi;

class Entry
{
    private $filename;
    private $document;

    function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    function metadata(): array
    {
        return $this->document()->getYAML();
    }

    function content(): string
    {
        return $this->document()->getContent();
    }

    private function document(): \Mni\FrontYAML\Document
    {
        if(is_null($this->document)) {
            $this->document = Parser::getInstance()->parse(file_get_contents($this->filename));
        }

        return $this->document;
    }
}
