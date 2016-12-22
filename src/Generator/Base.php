<?php

namespace Soushi\Generator;

trait Base
{
    private $dstDir;

    private function prepareDirectory(string $dstDir)
    {
        if (file_exists($dstDir)) {
            throw new \Soushi\Exception\File("directory for contents to be generated already exists");
        }
        if (!is_writable(getcwd())) {
            throw new \Soushi\Exception\File("directory for contents to be generated not writable");
        }
        if (!mkdir($dstDir, 0755)) {
            throw new \Soushi\Exception\File("directory for contents to be generated cannot be created");
        }

        $this->dstDir = $dstDir;
    }
}
