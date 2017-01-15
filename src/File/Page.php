<?php

namespace Soushi\File;

class Page implements \Soushi\File
{
    use Base;

    private $file;
    private $document;

    function __construct(\SplFileInfo $file)
    {
        $this->file = $file;
    }

    function isPage(): bool
    {
        return true;
    }

    function isIndexPage(): bool
    {
        return $this->path() === 'index' || preg_match('#\/index\z#', $this->path());
    }

    function metadata(): array
    {
        return $this->document()->getYAML();
    }

    function content(): string
    {
        return $this->document()->getContent();
    }

    function template(): string
    {
        return $this->metadata()["template"];
    }

    private function document(): \Mni\FrontYAML\Document
    {
        if(is_null($this->document)) {
            $this->document = \Soushi\Parser::getInstance()->parse(file_get_contents($this->file));
        }

        return $this->document;
    }
}
