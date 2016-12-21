<?php

use Symfony\Component\Finder\Finder\File;

namespace Soushi\File;

class Factory
{
    static function create(\SplFileInfo $file): \Soushi\File
    {
        if (preg_match("/\.md$/", $file->getPathname())) {
            return new Page($file);
        } else {
            return new Asset($file);
        }
    }
}
