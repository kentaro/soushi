<?php

use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    function testTemplate()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__).'/../templates');
        $this->assertInstanceOf(Soushi\Template::class, $tmpl);
    }

    function testRender()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__).'/../templates');
        $this->assertEquals(
            $tmpl->render('builtins/index', ['title' => 'test site']),
            <<<EOS
<title>test site</title>
Index

EOS
        );
    }
}
