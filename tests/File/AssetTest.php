<?php

use PHPUnit\Framework\TestCase;

class AssetTest extends TestCase
{
    function testAsset()
    {
        $asset = new Soushi\File\Asset(dirname(__FILE__).'/../assets/entry.md');
        $this->assertInstanceOf(Soushi\File\Asset::class, $asset);
    }

    function testIsEntry()
    {
        $asset = new Soushi\File\Asset(dirname(__FILE__).'/../assets/entry.md');
        $this->assertFalse($asset->isEntry());
    }
}
