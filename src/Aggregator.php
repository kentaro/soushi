<?php
use Symfony\Component\Finder\Finder;

namespace Soushi;

class Aggregator
{
    private $dirname;
    private $finder;
    private $files;

    function __construct(string $dirname)
    {
        $this->dirname = $dirname;
    }

    function files(): array
    {
        if (is_null($this->files)) {
            $this->files = [];
            foreach($this->iterator() as $file) {
                $this->files[] = File\Factory::create($file);
            }
        }

        return $this->files;
    }

    function fetch(string $path): File
    {
        foreach($this->files() as $file) {
            if ($file->path() == $path) {
                return $file;
            }
        }
    }

    private function iterator(): \Symfony\Component\Finder\Finder
    {
        if (is_null($this->finder)) {
            $this->finder = new \Symfony\Component\Finder\Finder();
            $this->finder->files()->in($this->dirname);
        }

        return $this->finder;
    }

}
