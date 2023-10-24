<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class LoginCheckPostRequestBody implements SerializableInterface, JsonSerializable
{
    private string $email;
    private string $password;
    /**
     * @param string $email
     * @param string $password
    */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    /**
     * @return string
    */
    public function getEmail() : string
    {
        return $this->email;
    }
    /**
     * @return string
    */
    public function getPassword() : string
    {
        return $this->password;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        $fields['email'] = $this->email;
        $fields['password'] = $this->password;
        return $fields;
    }
    /**
     * @return array
    */
    public function jsonSerialize() : array
    {
        return $this->toArray();
    }
}
