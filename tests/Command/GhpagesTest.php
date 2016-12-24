<?php

use PHPUnit\Framework\TestCase;

class GhpagesTest extends TestCase
{
    static $tmpDir;
    static $buildDir;

    static function setUpBeforeClass()
    {
        self::$tmpDir   = dirname(__FILE__) . "/../../tmp";
        self::$buildDir = self::$tmpDir . "/build";
        mkdir(self::$tmpDir);
    }

    static function tearDownAfterClass()
    {
        // too lazy to implement decent method...
        system("rm -rf " . self::$tmpDir);
    }

    function testGhpages()
    {
        $ghpages = new Soushi\Command\Ghpages(self::$buildDir);
        $this->assertInstanceOf(Soushi\Command\Ghpages::class, $ghpages);
    }
}
