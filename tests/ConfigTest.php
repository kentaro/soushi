<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    function testConfig()
    {
        $config = new Soushi\Config([
            "template_dir" => "/path/to/templates",
            "entry_dir"    => "/path/to/entries",
        ]);
        $this->assertInstanceOf(Soushi\Config::class, $config);
    }
}

