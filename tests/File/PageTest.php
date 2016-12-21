<?php

use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    function testPage()
    {
        $page = new Soushi\File\Page(new \SplFileInfo(dirname(__FILE__) . "/../assets/source/index.md"));
        $this->assertInstanceOf(Soushi\File\Page::class, $page);
    }

    function testIsEntry()
    {
        $page = new Soushi\File\Page(new \SplFileInfo(dirname(__FILE__) . "/../assets/source/index.md"));
        $this->assertTrue($page->isPage());
    }

    function testMetadata()
    {
        $page = new Soushi\File\Page(new \SplFileInfo(dirname(__FILE__) . "/../assets/source/index.md"));
        $this->assertEquals($page->metadata(), [
            "title"    => "test site",
            "author"   => "kentaro",
            "template" => "index",
        ]);
    }

    function testTemplate()
    {
        $page = new Soushi\File\Page(new \SplFileInfo(dirname(__FILE__) . "/../assets/source/index.md"));
        $this->assertEquals($page->template(), "index");
    }

    function testContent()
    {
        $page = new Soushi\File\Page(new \SplFileInfo(dirname(__FILE__) . "/../assets/source/index.md"));
        $this->assertEquals($page->content(), <<<EOS
<p>Hello, <strong>World</strong>.</p>
EOS
        );
    }
}
