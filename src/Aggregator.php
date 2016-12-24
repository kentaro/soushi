<?php

use Symfony\Component\Finder\Finder;

namespace Soushi;

class Aggregator
{
    private $sourceDir;
    private $finder;
    private $files;
    private $pages;
    private $assets;

    function __construct(string $sourceDir)
    {
        $this->sourceDir = $sourceDir;
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

    function pages(): array
    {
        if (is_null($this->pages)) {
            $this->pages = array_filter($this->files(), function ($e) {
                return $e->isPage();
            });
        }

        return $this->pages;
    }

    function assets(): array
    {
        if (is_null($this->assets)) {
            $this->assets = array_filter($this->files(), function ($e) {
                return !$e->isPage();
            });
        }

        return $this->assets;
    }

    function fetch(string $path): File
    {
        if ($path == "") {
            $path = "index";
        }

        foreach($this->files() as $file) {
            if ($file->isPage() && ($file->path() == $path)) {
                return $file;
            }
        }

        throw new \Soushi\Exception\PageNotFound("page not found");
    }

    private function iterator(): \Symfony\Component\Finder\Finder
    {
        if (is_null($this->finder)) {
            $this->finder = new \Symfony\Component\Finder\Finder();
            $this->finder->files()->in($this->sourceDir);
        }

        return $this->finder;
    }

}
