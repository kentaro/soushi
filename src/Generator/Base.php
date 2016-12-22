<?php

namespace Soushi\Generator;

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
}
