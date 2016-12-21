<?php

use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    function testTemplate()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__) . "/assets/templates");
        $this->assertInstanceOf(Soushi\Template::class, $tmpl);
    }

    function testRender()
    {
        $tmpl = new Soushi\Template(dirname(__FILE__) . "/assets/templates");
        $this->assertEquals(
            $tmpl->render("index", [
                "title"   => "test site",
                "content" => "page list",
            ]),
            <<<EOS
<title>test site</title>

<h1>Index</h1>

page list
EOS
        );
    }
}
