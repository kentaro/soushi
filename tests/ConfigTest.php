<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    function testConfig()
    {
        $config = new Soushi\Config([
            "site_title"   => "My Homepage",
            "template_dir" => "/path/to/templates",
            "source_dir"   => "/path/to/source",
        ]);
        $this->assertInstanceOf(Soushi\Config::class, $config);
    }

    function testBuild()
    {
        $config = new Soushi\Config([
            "site_title" => "My Homepage",
        ]);

        $this->assertEquals($config->template_dir(), dirname(__FILE__, 2) . "/templates");
        $this->assertEquals($config->source_dir(), dirname(__FILE__, 2) . "/source");
        $this->assertEquals($config->site_title(), "My Homepage");
    }
}
