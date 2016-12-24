<?php

use PHPUnit\Framework\TestCase;

class AggregatorTest extends TestCase
{
    function testAggregator()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $this->assertInstanceOf(Soushi\Aggregator::class, $aggregator);
    }

    function testFiles()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $files = $aggregator->files();
        $this->assertEquals(count($files), 5);
    }

    function testPages()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $files = $aggregator->pages();
        $this->assertEquals(count($files), 3);
    }

    function testAssets()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $files = $aggregator->assets();
        $this->assertEquals(count($files), 2);
    }

    function testFetch()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $file = $aggregator->fetch("subdir/foo");
        $this->assertEquals($file->path(), "subdir/foo");
    }

    /**
     * @expectedException \Soushi\Exception\PageNotFound
     */
    function testFetchFailure()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__) . "/assets/source");
        $file = $aggregator->fetch("no such page");
    }
}
