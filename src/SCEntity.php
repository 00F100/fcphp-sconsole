<?php

namespace FcPhp\SConsole
{
    use FcPhp\SHttp\SEntity;
    use FcPhp\SConsole\Interfaces\ISCEntity;
    use FcPhp\SHttp\Interfaces\ISEntity;

    class SCEntity extends SEntity implements ISCEntity
    {
        public function __construct(int $expires = 84000)
        {
            parent::__construct($expires);
        }

        /**
         * Method to set Id of login
         *
         * @param string $id Id of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setId(string $id) :ISEntity
        {
            return parent::setId($id);
        }

        /**
         * Method to get Id of login
         *
         * @return string|null
         */
        public function getId()
        {
            return parent::getId();
        }

        /**
         * Method to set Name of login
         *
         * @param string $name Name of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setName(string $name) :ISEntity
        {
            return parent::setName($name);
        }

        /**
         * Method to get Name of login
         *
         * @return string|null
         */
        public function getName()
        {
            return parent::getName();
        }

        /**
         * Method to set E-mail of login
         *
         * @param string $email E-mail of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setEmail(string $email) :ISEntity
        {
            return parent::setEmail($email);
        }

        /**
         * Method to get E-mail of login
         *
         * @return string|null
         */
        public function getEmail()
        {
            return parent::getEmail();
        }

        /**
         * Method to set User name of login
         *
         * @param string $username User name of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setUsername(string $username) :ISEntity
        {
            return parent::setUsername($username);
        }

        /**
         * Method to get User name of login
         *
         * @return string|null
         */
        public function getUsername()
        {
            return parent::getUsername();
        }

        /**
         * Method to set Type of login
         *
         * @param string|int $type Type of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setType($type) :ISEntity
        {
            
            return parent::setType($type);
        }

        /**
         * Method to get Type of login
         *
         * @return string
         */
        public function getType() :string
        {
            return parent::getType();
        }

        /**
         * Method to set Permissions of login
         *
         * @param array $permissions Permissions of login
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setPermissions(array $permissions) :ISEntity
        {
            return parent::setPermissions($permissions);
        }

        /**
         * Method to get Permissions of login
         *
         * @return array
         */
        public function getPermissions() :array
        {
            return parent::getPermissions();
        }

        /**
         * Method to set Custom data of login
         *
         * @param string $key Key to save content
         * @param array|string $customData Data to save
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setCustomData(string $key, $customData) :ISEntity
        {
            return parent::setCustomData($key, $customData);
        }

        /**
         * Method to get Custom data of login
         *
         * @param string|null $key Key to find content
         * @return array|null
         */
        public function getCustomData(string $key = null)
        {
            return parent::getCustomData($key);
        }

        /**
         * Method to check if have access to permission
         *
         * @param string $permission Permission to check
         * @return bool
         */
        public function check(string $permission) :bool
        {
            return parent::check($permission);
        }

        /**
         * Method to set Errors of login
         *
         * @param string $message Message of error
         * @return cPhp\SHttp\Interfaces\ISEntity
         */
        public function setError(string $message) :ISEntity
        {
            return parent::setError($message);
        }

        /**
         * Method to get Errors of login
         *
         * @return array
         */
        public function getError() :array
        {
            return parent::getError();
        }

        /**
         * Method to check if have errors in login
         *
         * @return bool
         */
        public function haveErrors() :bool
        {
            return parent::haveErrors();
        }

        /**
         * Method to check if this Security Entity has expired
         *
         * @return bool
         */
        public function isExpired() :bool
        {
            return parent::isExpired();
        }
    }
}
