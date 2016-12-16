<?php

namespace Soushi;

class Entry
{
    public $content;

    function __construct($filename)
    {
        $this->content = file_get_contents($filename);
    }
}
