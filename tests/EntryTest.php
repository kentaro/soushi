<?php

use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    function testEntry()
    {
        $entry = new Soushi\Entry(dirname(__FILE__).'/assets/entry.md');

        $this->assertEquals($entry->metadata(), [
            "title"  => "test entry",
            "author" => "kentaro",
        ]);
        $this->assertEquals($entry->content(), <<<EOS
<p>Hello, <strong>World</strong>.</p>
EOS
        );
    }
}
