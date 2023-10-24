<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class LoginCheckPostResponseBody implements SerializableInterface, JsonSerializable
{
    private string $token;
    /**
     * @param string $token
    */
    public function __construct(string $token)
    {
        $this->token = $token;
    }
    /**
     * @return string
    */
    public function getToken() : string
    {
        return $this->token;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        $fields['token'] = $this->token;
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
