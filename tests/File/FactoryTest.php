<?php

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    function testFactory()
    {
        $page = Soushi\File\Factory::create(new \SplFileInfo('test.md'));
        $this->assertInstanceOf(Soushi\File\Page::class, $page);

        $asset = Soushi\File\Factory::create(new \SplFileInfo('test.css'));
        $this->assertInstanceOf(Soushi\File\Asset::class, $asset);
    }
}
