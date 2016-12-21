<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    function testConfig()
    {
        $config = new Soushi\Config([
            "template_dir" => "/path/to/templates",
            "source_dir"   => "/path/to/source",
        ]);
        $this->assertInstanceOf(Soushi\Config::class, $config);
    }
}

