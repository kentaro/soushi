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
        // too lazy to implement decent method...
        system("rm -rf " . self::$tmpDir);
    }

    function testGenerate()
    {
        $web = new Soushi\Generator\Web(self::$publicDir);
        $web->generate();

        $this->assertFileExists(self::$tmpDir    . "/config.php");
        $this->assertFileExists(self::$publicDir . "/index.php");
    }
}
