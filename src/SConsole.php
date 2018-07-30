<?php

namespace FcPhp\SConsole
{
    use FcPhp\SConsole\Interfaces\ISCEntity;
    use FcPhp\SConsole\Interfaces\ISConsole;
    
    class SConsole implements ISConsole
    {
        private $server = [];
        private $entity;
        private $params = [];
        private $authCallback;

        /**
         * Method to construct instance
         *
         * @param array $server $_SERVER params
         * @return cPhp\SConsole\Interfaces\ISCEntity $entity Entity of Security Console
         * @return void
         */
        public function __construct(array $server, ISCEntity $entity)
        {
            $this->server = $server;
            $this->entity = $entity;
            $this->params = [
                'path' => $this->getContent('PWD'),
                'script-name' => $this->getContent('SCRIPT_NAME'),
                'home' => $this->getContent('HOME'),
                'lang' => $this->getContent('LANG'),
                'shell' => $this->getContent('SHELL'),
                'user' => $this->getContent('USER'),
                'username' => $this->getContent('USERNAME'),
                'params' => $this->getContent('argv'),
                'userdir' => getenv('FCPHP_USERDIR') ? getenv('FCPHP_USERDIR') : '~/.fcphp/console/',
            ];
            $this->cleanParams();
        }

        /**
         * Method to clean args send with console command
         *
         * @return void
         */
        private function cleanParams() :void
        {
            if(is_array($this->params['params'])) {
                foreach($this->params['params'] as $index => $value) {
                    if($value == $this->params['script-name']) {
                        unset($this->params['params'][$index]);
                    }
                }
            }
        }

        /**
         * Method to get entity after callback auth
         *
         * @return FcPhp\SConsole\Interfaces\ISCEntity
         */
        public function get() :ISCEntity
        {
            if(!is_null($this->authCallback)) {
                $authCallback = $this->authCallback;
                return $authCallback($this->entity, $this->params, $this->server);
            }
            return $this->authGuest();
        }

        /**
         * Method to configure auth callback
         *
         * @param object $callback Callback to execute
         * @return void
         */
        public function authCallback(object $callback = null) :void
        {
            $this->authCallback = $callback;
        }

        /**
         * Method to auth guest user
         *
         * @return FcPhp\SConsole\Interfaces\ISCEntity
         */
        private function authGuest() :ISCEntity
        {
            $this->entity->setType('guest');
            return $this->entity;
        }

        /**
         * Method to get content of variable into server
         *
         * @param string $key Key to find
         * @return string|array|null
         */
        private function getContent(string $key)
        {
            if(isset($this->server[$key])) {
                return $this->server[$key];
            }
            return null;
        }
    }
}