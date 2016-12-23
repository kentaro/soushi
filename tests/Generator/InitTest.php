<?php

use PHPUnit\Framework\TestCase;

class GeneratorInitTest extends TestCase
{
    static $tmpDir;

    static function setUpBeforeClass()
    {
        self::$tmpDir = dirname(__FILE__) . "/../../tmp";
        mkdir(self::$tmpDir);
    }

    static function tearDownAfterClass()
    {
        // too lazy to implement decent method...
        system("rm -rf " . self::$tmpDir);
    }

    function testGenerate()
    {
        $init = new Soushi\Generator\Init(self::$tmpDir);
        $init->generate();

        $this->assertFileExists(self::$tmpDir . "/.gitignore");
        $this->assertFileExists(self::$tmpDir . "/public");
        $this->assertFileExists(self::$tmpDir . "/source");
        $this->assertFileExists(self::$tmpDir . "/templates");
        $this->assertFileExists(self::$tmpDir . "/build");
        $this->assertFileExists(self::$tmpDir . "/config.php");
        $this->assertFileExists(self::$tmpDir . "/public/index.php");
    }
}
