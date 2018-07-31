# FcPhp Security Console

Library to manipulate auth of user into Console env

[![Build Status](https://travis-ci.org/00F100/fcphp-sconsole.svg?branch=master)](https://travis-ci.org/00F100/fcphp-sconsole) [![codecov](https://codecov.io/gh/00F100/fcphp-sconsole/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-sconsole) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-sconsole/downloads)](https://packagist.org/packages/00F100/fcphp-sconsole)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-sconsole
```

or add in composer.json
```json
{
    "require": {
        "00f100/fcphp-sconsole": "*"
    }
}
```

## How to use

```php
<?php

use FcPhp\SConsole\Facades\SConsoleFacade;
use FcPhp\SConsole\Interfaces\ISCEntity;

// Init instance
$instance = SConsoleFacade::getInstance();

// Configure Callback
$instance->authCallback(function(ISCEntity $entity, array $params, array $server) {

    // Your validate code here...

    $entity->setType('user');
    // $entity->setType('admin');
    // default: $entity->setType('guest');
    $entity->setName('any name');
    return $entity;
});

// FcPhp\SConsole\Interfaces\ISCEntity
$SecurityConsoleEntity = $instance->get();

// Print: any name
echo $SecurityConsoleEntity->getName();
```

#### [FcPhp\SConsole\Interfaces\ISCEntity](https://github.com/00F100/fcphp-sconsole/blob/master/src/Interfaces/ISCEntity.php)

```php
interface ISCEntity
    {
        /**
         * Method to construct instance of Security Entity
         *
         * @param int $expires Timestamp expires Security Entity
         * @return void
         */
        public function __construct(int $expires = 84000);

        /**
         * Method to set Id of login
         *
         * @param string $id Id of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setId(string $id) :ISEntity;

        /**
         * Method to get Id of login
         *
         * @return string|null
         */
        public function getId();

        /**
         * Method to set Name of login
         *
         * @param string $name Name of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setName(string $name) :ISEntity;

        /**
         * Method to get Name of login
         *
         * @return string|null
         */
        public function getName();

        /**
         * Method to set E-mail of login
         *
         * @param string $email E-mail of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setEmail(string $email) :ISEntity;
        /**
         * Method to get E-mail of login
         *
         * @return string|null
         */
        public function getEmail();

        /**
         * Method to set User name of login
         *
         * @param string $username User name of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setUsername(string $username) :ISEntity;
        /**
         * Method to get User name of login
         *
         * @return string|null
         */
        public function getUsername();

        /**
         * Method to set Type of login
         *
         * @param string|int $type Type of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setType($type) :ISEntity;
        /**
         * Method to get Type of login
         *
         * @return string
         */
        public function getType() :string;

        /**
         * Method to set Permissions of login
         *
         * @param array $permissions Permissions of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setPermissions(array $permissions) :ISEntity;
        /**
         * Method to get Permissions of login
         *
         * @return array
         */
        public function getPermissions() :array;
        /**
         * Method to check if have access to permission
         *
         * @param string $permission Permission to check
         * @return bool
         */
        public function check(string $permission) :bool;

        /**
         * Method to set Custom data of login
         *
         * @param string $key Key to save content
         * @param array|string $customData Data to save
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setCustomData(string $key, $customData) :ISEntity;
        /**
         * Method to get Custom data of login
         *
         * @param string|null $key Key to find content
         * @return array|null
         */
        public function getCustomData(string $key = null);

        /**
         * Method to set Errors of login
         *
         * @param string $message Message of error
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setError(string $message) :ISEntity;

        /**
         * Method to get Errors of login
         *
         * @return array
         */
        public function getError() :array;
        
        /**
         * Method to check if have errors in login
         *
         * @return bool
         */
        public function haveErrors() :bool;

        /**
         * Method to check if this Security Entity has expired
         *
         * @return bool
         */
        public function isExpired() :bool;
    }
```