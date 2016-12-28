<?php

use PHPUnit\Framework\TestCase;

class InitTest extends TestCase
{
    static $tmpDir;

    static function setUpBeforeClass()
    {
        self::$tmpDir = dirname(__FILE__, 3) . "/tmp";
        mkdir(self::$tmpDir);
    }

    static function tearDownAfterClass()
    {
        // too lazy to implement decent method...
        system("rm -rf " . self::$tmpDir);
    }

    function testExecute()
    {
        $init = new Soushi\Command\Init(self::$tmpDir);
        $init->execute();

        $this->assertFileExists(self::$tmpDir . "/.gitignore");
        $this->assertFileExists(self::$tmpDir . "/public");
        $this->assertFileExists(self::$tmpDir . "/source");
        $this->assertFileExists(self::$tmpDir . "/templates");
        $this->assertFileExists(self::$tmpDir . "/build");
        $this->assertFileExists(self::$tmpDir . "/config.php");
        $this->assertFileExists(self::$tmpDir . "/public/index.php");
        $this->assertFileExists(self::$tmpDir . "/public/.htaccess");
    }
}
