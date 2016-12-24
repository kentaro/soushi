<?php

namespace Soushi\Command;

trait Base
{
    private $dstDir;

    private function prepareDirectory(string $dstDir)
    {
        if (!is_writable(dirname($dstDir))) {
            throw new \Soushi\Exception\File("directory for contents to be generated not writable");
        }
        if (!file_exists($dstDir) && !mkdir($dstDir, 0755)) {
            throw new \Soushi\Exception\File("directory for contents to be generated cannot be created");
        }

        $this->dstDir = $dstDir;
    }

    private function filePutContentsDeeply($path, $contents)
    {
        $parts = explode("/", $path);
        $file  = array_pop($parts);
        $dir   = "";

        foreach ($parts as $part) {
            if(!is_dir($dir .= "/$part")) mkdir($dir);
        }

        return file_put_contents("$dir/$file", $contents);
    }
}
