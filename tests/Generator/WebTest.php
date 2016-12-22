<?php

use PHPUnit\Framework\TestCase;

class GeneratorWebTest extends TestCase
{
    static $tmpDir;
    static $publicDir;

    static function setUpBeforeClass()
    {
        self::$tmpDir    = dirname(__FILE__) . "/../../tmp";
        self::$publicDir = self::$tmpDir . "/public";
        mkdir(self::$tmpDir);
    }

    static function tearDownAfterClass()
    {
        system("rm -rf " . self::$tmpDir);
    }

    function testGeneratorWeb()
    {
        $web = new Soushi\Generator\Web(self::$publicDir);
        $web->generate();

        $this->assertFileExists(self::$tmpDir    . "/config.php");
        $this->assertFileExists(self::$publicDir . "/index.php");
    }
}
