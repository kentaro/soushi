<?php

use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    function testEntry()
    {
        $entry = new Soushi\File\Entry(dirname(__FILE__).'/../assets/entry.md');
        $this->assertInstanceOf(Soushi\File\Entry::class, $entry);
    }

    function testIsEntry()
    {
        $asset = new Soushi\File\Entry(dirname(__FILE__).'/../assets/entry.md');
        $this->assertTrue($asset->isEntry());
    }

    function testMetadata()
    {
        $entry = new Soushi\File\Entry(dirname(__FILE__).'/../assets/entry.md');
        $this->assertEquals($entry->metadata(), [
            "title"  => "test entry",
            "author" => "kentaro",
        ]);
    }

    function testContent()
    {
        $entry = new Soushi\File\Entry(dirname(__FILE__).'/../assets/entry.md');
        $this->assertEquals($entry->content(), <<<EOS
<p>Hello, <strong>World</strong>.</p>
EOS
        );
    }
}
