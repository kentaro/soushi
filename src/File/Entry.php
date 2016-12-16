<?php
namespace Soushi\File;

class Entry implements \Soushi\File
{
    use Base;

    private $file;
    private $document;

    function __construct(\SplFileInfo $file)
    {
        $this->file = $file;
    }

    function isEntry(): bool
    {
        return true;
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
            $this->document = \Soushi\Parser::getInstance()->parse(file_get_contents($this->file));
        }

        return $this->document;
    }
}