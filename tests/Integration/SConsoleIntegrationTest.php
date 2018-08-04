<?php

use FcPhp\SConsole\SConsole;
use FcPhp\SConsole\Interfaces\ISConsole;
use PHPUnit\Framework\TestCase;
use FcPhp\SConsole\Interfaces\ISCEntity;
use FcPhp\SConsole\Facades\SConsoleFacade;

class SConsoleIntegrationTest extends TestCase
{
    public function setUp()
    {
        $this->instance = SConsoleFacade::getInstance();
        $this->instance->authCallback(function(ISCEntity $entity, array $params, array $server) {
            $entity->setType('user');
            $entity->setName('user name');
            return $entity;
        });
        $this->sconsole = $this->instance->get();
    }

    public function testInstance()
    {
        $this->assertTrue($this->instance instanceof ISConsole);
    }

    public function testAuthGuest()
    {

        $this->instance->authCallback(null);
        $this->sconsole = $this->instance->get();
        $this->assertEquals($this->sconsole->getType(), 'guest');
    }

    public function testAuthCallback()
    {
        
        $this->assertEquals($this->sconsole->getName(), 'user name');
    }

    public function testInstanceEntity()
    {
        $this->assertTrue($this->sconsole instanceof ISCEntity);
    }

    public function testSetId()
    {
        $this->sconsole->setId('123');
        $this->assertEquals($this->sconsole->getId(), '123');
    }

    public function testSetName()
    {
        $this->sconsole->setName('name');
        $this->assertEquals($this->sconsole->getName(), 'name');
    }

    public function testSetEmail()
    {
        $this->sconsole->setEmail('email@email.com');
        $this->assertEquals($this->sconsole->getEmail(), 'email@email.com');
    }

    public function testSetUsername()
    {
        $this->sconsole->setUsername('username');
        $this->assertEquals($this->sconsole->getUsername(), 'username');
    }

    public function testSetTypeString()
    {
        $this->sconsole->setType('admin');
        $this->assertEquals($this->sconsole->getType(), 'admin');
    }

    public function testSetTypeInteger()
    {
        $this->sconsole->setType(2);
        $this->assertEquals($this->sconsole->getType(), 'user');
    }

    public function testSetPermissions()
    {
        $permissions = [
            'list.users'
        ];
        $this->sconsole->setPermissions($permissions);
        $this->assertEquals($this->sconsole->getPermissions(), $permissions);
    }

    public function testSetCustomData()
    {
        $arrayCustomData = [
            'content' => [
                'test' => [
                    'item' => 'value'
                ]
            ]
        ];
        $key = 'content.test.item';
        $customData = 'value';
        $this->sconsole->setCustomData($key, $customData);
        $this->assertEquals($this->sconsole->getCustomData(), $arrayCustomData);
        $this->assertEquals($this->sconsole->getCustomData('content.test.item'), 'value');
    }

    public function testSetErrors()
    {
        $message = 'error message';
        $this->sconsole->setError($message);
        $this->assertTrue($this->sconsole->haveErrors());
        $this->assertEquals($this->sconsole->getError(), [$message]);
    }

    public function testCheckPermissionAdmin()
    {
        $this->sconsole->setType('admin');
        $this->assertTrue($this->sconsole->check('list.all'));
    }

    public function testCheckPermissionUser()
    {
        $this->sconsole->setType('user');
        $this->sconsole->setPermissions(['list.all']);
        $this->assertTrue($this->sconsole->check('list.all'));
    }

    public function testIsExpired()
    {
        $this->assertTrue(!$this->sconsole->isExpired());
    }
}
