<?php
namespace Soushi\File;

class Factory
{
    static function create(string $filename): \Soushi\File
    {
        if (preg_match('/\.md$/', $filename)) {
            return new Entry($filename);
        } else {
            return new Asset($filename);
        }
    }
}
