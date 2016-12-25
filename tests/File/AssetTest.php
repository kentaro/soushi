<?php

use PHPUnit\Framework\TestCase;

class AssetTest extends TestCase
{
    function testAsset()
    {
        $asset = new Soushi\File\Asset(new \SplFileInfo(dirname(__FILE__, 2) . "/assets/page.md"));
        $this->assertInstanceOf(Soushi\File\Asset::class, $asset);
    }

    function testIsPage()
    {
        $asset = new Soushi\File\Asset(new \SplFileInfo(dirname(__FILE__, 2) . "/assets/page.md"));
        $this->assertFalse($asset->isPage());
    }
}
