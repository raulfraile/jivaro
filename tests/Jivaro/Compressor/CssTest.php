<?php

namespace Jivaro\Tests;

use Jivaro\Compressor\Css;

class CssTest extends \PHPUnit_Framework_TestCase
{

    /** @var Css $compressor */
    protected $compressor;

    public function setUp()
    {
        $this->compressor = new Css();
    }

    public function testAddOneString()
    {
        $compressor = new Css();

        $compressor->addString('test');

        $this->assertEquals('test', $compressor->getContents());
    }

    public function testAddMoreThanOneString()
    {
        $compressor = new Css();

        $compressor->addString('test')->addString('test2');

        $this->assertEquals('testtest2', $compressor->getContents());
    }

    public function testAddOneFile()
    {
        $compressor = new Css();

        $file = __DIR__.'/../../files/test.css';
        $compressor->addFile($file);

        $this->assertEquals(file_get_contents($file), $compressor->getContents());
    }

    public function testAddMoreThanOneFile()
    {
        $compressor = new Css();

        $file = __DIR__.'/../../files/test.css';
        $compressor->addFile($file)->addFile($file);

        $this->assertEquals(str_repeat(file_get_contents($file), 2), $compressor->getContents());
    }

}