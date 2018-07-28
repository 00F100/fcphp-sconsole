<?php

use FcPhp\SConsole\SConsole;
use FcPhp\SConsole\Interfaces\ISConsole;
use PHPUnit\Framework\TestCase;

class SConsoleUnitTest extends TestCase
{
    public function setUp()
    {
        $this->instance = new SConsole($_SERVER);
    }

    public function testInstance()
    {
        $this->assertTrue($this->instance instanceof ISConsole);
    }
}