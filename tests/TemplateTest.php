<?php

use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    function testTemplate()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__).'/../templates');
        $this->assertInstanceOf(Soushi\Template::class, $tmpl);
    }

    function testEngine()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__).'/../templates');
        $this->assertInstanceOf(\League\Plates\Engine::class, $tmpl->engine());
    }

    function testRender()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__).'/../templates');
        $this->assertEquals(
            $tmpl->render('builtins/blog/index', ['title' => 'test site']),
            <<<EOS
<title>test site</title>
Index

EOS
        );
    }
}
