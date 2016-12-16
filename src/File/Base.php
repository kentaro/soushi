<?php
namespace Soushi\File;

trait Base
{
    function path(): string
    {
        return preg_replace("/(.+)\.{$this->file->getExtension()}$/", '$1', $this->file->getRelativePathname());
    }
}
