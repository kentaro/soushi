<?php

use PHPUnit\Framework\TestCase;

class WebTest extends TestCase
{
    function testWeb()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/assets/templates',
            "source_dir"   => dirname(__FILE__).'/assets/source',
        ]);
        $web = new Soushi\Web($config);
        $this->assertInstanceOf(Soushi\Web::class, $web);
    }

    function testDispatch()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/assets/templates',
            "source_dir"   => dirname(__FILE__).'/assets/source',
        ]);
        $web = new Soushi\Web($config);
        $html = $web->dispatch("/subdir/foo");

        $this->assertStringStartsWith("<", $html);
    }

    function testNormalizePath()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/assets/templates',
            "source_dir"   => dirname(__FILE__).'/assets/source',
        ]);
        $web = new Soushi\Web($config);

        $path = $web->normalizePath("/");
        $this->assertSame("", $path);

        $path = $web->normalizePath("/index.php");
        $this->assertSame("", $path);

        $path = $web->normalizePath("/foo/bar");
        $this->assertSame("foo/bar", $path);

        $path = $web->normalizePath("/index.php/foo/bar");
        $this->assertSame("foo/bar", $path);
    }

    function testHandle404()
    {
        $config = new Soushi\Config([
            "template_dir" => dirname(__FILE__).'/assets/templates',
            "source_dir"   => dirname(__FILE__).'/assets/source',
        ]);
        $web = new Soushi\Web($config);
        $html = $web->dispatch("/no/such/path");

        $this->assertSame("page not found", $html);
    }
}
