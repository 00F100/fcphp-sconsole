<?php

use FcPhp\SConsole\SConsole;
use FcPhp\SConsole\Interfaces\ISConsole;
use PHPUnit\Framework\TestCase;
use FcPhp\SConsole\Interfaces\ISCEntity;

class SConsoleUnitTest extends TestCase
{
    public function setUp()
    {
        $this->server = [
            'script-name' => 'test-script',
            'argv' => [
                'test-script',
                'connect',
                'server',
            ],
        ];
        $this->entity = $this->createMock('FcPhp\SConsole\Interfaces\ISCEntity');
        $this->entity
            ->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('user name'));
        $this->entity
            ->expects($this->any())
            ->method('getType')
            ->will($this->returnValue('guest'));
        $this->instance = new SConsole($this->server, $this->entity);
    }

    public function testInstance()
    {
        $this->assertTrue($this->instance instanceof ISConsole);
    }

    public function testAuthGuest()
    {
        $sconsole = $this->instance->get();
        $this->assertEquals($sconsole->getType(), 'guest');
    }

    public function testAuthCallback()
    {
        $this->instance->authCallback(function(ISCEntity $entity, array $params, array $server) {
            $entity->setType('user');
            $entity->setName('user name');
            return $entity;
        });
        $sconsole = $this->instance->get();
        $this->assertEquals($sconsole->getName(), 'user name');
    }
}