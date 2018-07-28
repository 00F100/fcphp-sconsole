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

        public function get() :ISCEntity
        {
            if(!is_null($this->authCallback)) {
                $authCallback = $this->authCallback;
                return $authCallback($this->entity, $this->params, $this->server);
            }
            return $this->authGuest();
        }

        public function authCallback(object $callback) :void
        {
            $this->authCallback = $callback;
        }

        private function authGuest()
        {
            $this->entity->setType('guest');
            return $this->entity;
        }

        private function getContent(string $key)
        {
            if(isset($this->server[$key])) {
                return $this->server[$key];
            }
            return null;
        }
    }
}