<?php

use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    function testEntry()
    {
        $entry = new Soushi\Entry(__FILE__);
        $this->assertEquals(file_get_contents(__FILE__), $entry->content);
    }
}
