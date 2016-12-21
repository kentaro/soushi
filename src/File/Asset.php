<?php

namespace Soushi\File;

class Asset implements \Soushi\File
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
        return false;
    }
}

