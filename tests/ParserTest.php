<?php

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    function testSingleton()
    {
        $this->assertEquals(
            Soushi\Parser::getInstance(),
            Soushi\Parser::getInstance()
        );
    }
}
