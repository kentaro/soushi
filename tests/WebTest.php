<?php

use PHPUnit\Framework\TestCase;

class WebTest extends TestCase
{
    function testWeb()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/../templates',
            "source_dir"   => dirname(__FILE__).'/assets',
        ]);
        $web = new Soushi\Web($config);
        $this->assertInstanceOf(Soushi\Web::class, $web);
    }

    function testDispatch()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/../templates',
            "source_dir"   => dirname(__FILE__).'/assets',
        ]);
        $web = new Soushi\Web($config);
        $html = $web->dispatch("/subdir/foo");

        $this->assertStringStartsWith("<", $html);
    }

    function testHandle404()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/../templates',
            "source_dir"   => dirname(__FILE__).'/assets',
        ]);
        $web = new Soushi\Web($config);
        $html = $web->dispatch("/no/such/path");

        $this->assertSame("page not found", $html);
    }
}
