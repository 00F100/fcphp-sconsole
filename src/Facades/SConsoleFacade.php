<?php

namespace FcPhp\SConsole\Facades
{
    use FcPhp\SConsole\SCEntity;
    use FcPhp\SConsole\SConsole;
    use FcPhp\SConsole\Interfaces\ISConsole;

    class SConsoleFacade
    {
        private static $instance;

        public static function getInstance()
        {
            if(!self::$instance instanceof ISConsole) {
                $entity = new SCEntity();
                self::$instance = new SConsole($_SERVER, $entity);
            }
            return self::$instance;
        }
    }
}