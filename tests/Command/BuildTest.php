<?php

use PHPUnit\Framework\TestCase;

class BuildTest extends TestCase
{
    static $cwd;
    static $tmpDir;
    static $buildDir;

    static function setUpBeforeClass()
    {
        self::$cwd      = getcwd();
        self::$tmpDir   = dirname(__FILE__) . "/../../tmp";
        self::$buildDir = self::$tmpDir . "/build";
        mkdir(self::$tmpDir);
        chdir(dirname(__FILE__) . "/../assets");
    }

    static function tearDownAfterClass()
    {
        // too lazy to implement decent method...
        system("rm -rf " . self::$tmpDir);
        chdir(self::$cwd);
    }

    function testGenerate()
    {
        $init = new Soushi\Command\Build(self::$buildDir);
        $init->execute();

        $this->assertFileExists(self::$buildDir . "/index.html");
        $this->assertFileExists(self::$buildDir . "/subdir/foo.html");
        $this->assertFileExists(self::$buildDir . "/subdir/bar.html");
        $this->assertFileExists(self::$buildDir . "/css/main.css");
        $this->assertFileExists(self::$buildDir . "/js/main.js");
    }
}
