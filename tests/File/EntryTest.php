<?php

use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    function testEntry()
    {
        $entry = new Soushi\File\Entry(new \SplFileInfo(dirname(__FILE__).'/../assets/entry.md'));
        $this->assertInstanceOf(Soushi\File\Entry::class, $entry);
    }

    function testIsEntry()
    {
        $entry = new Soushi\File\Entry(new \SplFileInfo(dirname(__FILE__).'/../assets/entry.md'));
        $this->assertTrue($entry->isEntry());
    }

    function testMetadata()
    {
        $entry = new Soushi\File\Entry(new \SplFileInfo(dirname(__FILE__).'/../assets/entry.md'));
        $this->assertEquals($entry->metadata(), [
            "title"  => "test entry",
            "author" => "kentaro",
        ]);
    }

    function testContent()
    {
        $entry = new Soushi\File\Entry(new \SplFileInfo(dirname(__FILE__).'/../assets/entry.md'));
        $this->assertEquals($entry->content(), <<<EOS
<p>Hello, <strong>World</strong>.</p>
EOS
        );
    }
}
