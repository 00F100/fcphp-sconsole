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

    $entity->setName('any name');
    return $entity;
});

// 
$SecurityConsoleEntity = $instance->get();

// Print: any name
echo $SecurityConsoleEntity->getName();
```