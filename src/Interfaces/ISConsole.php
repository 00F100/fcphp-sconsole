<?php

namespace FcPhp\SConsole\Interfaces
{
    interface ISConsole
    {
        /**
         * Method to construct instance
         *
         * @param array $server $_SERVER params
         * @return FcPhp\SConsole\Interfaces\ISCEntity $entity Entity of Security Console
         * @return void
         */
        public function __construct(array $server, ISCEntity $entity);

        /**
         * Method to get entity after callback auth
         *
         * @return FcPhp\SConsole\Interfaces\ISCEntity
         */
        public function get() :ISCEntity;

        /**
         * Method to configure auth callback
         *
         * @param object $callback Callback to execute
         * @return void
         */
        public function authCallback(object $callback = null) :void;
    }
}
