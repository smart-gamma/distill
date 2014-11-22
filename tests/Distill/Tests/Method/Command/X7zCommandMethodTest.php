<?php

namespace Distill\Tests\Method\Command;

use Distill\Method;
use Distill\Format;
use Distill\Tests\Method\AbstractMethodTest;

class X7zCommandMethodTest extends AbstractMethodTest
{

    public function setUp()
    {
        $this->method = new Method\Command\X7zCommandMethod();
        parent::setUp();
    }

    public function testExtractCorrect7zFile()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_ok.7z', $target, new Format\X7z());

        $this->assertTrue($response);
        $this->clearTemporaryPath();
    }

    public function testExtractFake7zFile()
    {
        $this->setExpectedException('Distill\\Exception\\CorruptedFileException');

        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $this->extract('file_fake.7z', $target, new Format\X7z());

        $this->clearTemporaryPath();
    }

    public function testExtractNo7zFile()
    {
        $this->setExpectedException('Distill\\Exception\\FormatNotSupportedInMethodException');

        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_ok.phar', $target, new Format\Phar());

        $this->assertFalse($response);
        $this->clearTemporaryPath();
    }

    public function testExtractCorruptZipFile()
    {
        $this->setExpectedException('Distill\\Exception\\CorruptedFileException');

        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $this->extract('file_corrupt.zip', $target, new Format\Zip());
    }

}
