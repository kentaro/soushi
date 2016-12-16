<?php

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    function testParser()
    {
        $parser = Soushi\Parser::getInstance();
        $this->assertInstanceOf(Soushi\Parser::class, $parser);
    }

    function testSingleton()
    {
        $this->assertEquals(
            Soushi\Parser::getInstance(),
            Soushi\Parser::getInstance()
        );
    }
}
