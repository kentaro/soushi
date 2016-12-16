<?php

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    function testFactory()
    {
        $entry = Soushi\File\Factory::create('test.md');
        $this->assertInstanceOf(Soushi\File\Entry::class, $entry);

        $asset = Soushi\File\Factory::create('test.css');
        $this->assertInstanceOf(Soushi\File\Asset::class, $asset);
    }
}
