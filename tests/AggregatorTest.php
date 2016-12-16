<?php

use PHPUnit\Framework\TestCase;

class AggregatorTest extends TestCase
{
    function testAggregator()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__).'/assets');
        $this->assertInstanceOf(Soushi\Aggregator::class, $aggregator);
    }

    function testIter()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__).'/assets');
        $iter = $aggregator->iterator();
        $this->assertEquals(iterator_count($iter), 3);
    }

    function testFiles()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__).'/assets');
        $files = $aggregator->files();
        $this->assertEquals(count($files), 3);
    }

    function testFetch()
    {
        $aggregator = new Soushi\Aggregator(dirname(__FILE__).'/assets');
        $file = $aggregator->fetch('subdir/foo');
        $this->assertEquals($file->path(), 'subdir/foo');
    }
}
