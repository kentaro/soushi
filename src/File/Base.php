<?php

namespace Soushi\File;

trait Base
{
    function path(): string
    {
        return preg_replace("/(.+)\.{$this->file->getExtension()}$/", '$1', $this->file->getRelativePathname());
    }

    function pathWithExtension(): string
    {
        return $this->file->getRelativePathname();
    }

    function absolutePath(): string
    {
        return $this->file->getRealPath();
    }
}
