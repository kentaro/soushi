<?php

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    function testFactory()
    {
        $entry = Soushi\File\Factory::create(new \SplFileInfo('test.md'));
        $this->assertInstanceOf(Soushi\File\Entry::class, $entry);

        $asset = Soushi\File\Factory::create(new \SplFileInfo('test.css'));
        $this->assertInstanceOf(Soushi\File\Asset::class, $asset);
    }
}
