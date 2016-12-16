<?php
namespace Soushi\File;

class Asset implements \Soushi\File
{
    private $filename;
    private $document;

    function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    function isEntry(): bool
    {
        return false;
    }
}

