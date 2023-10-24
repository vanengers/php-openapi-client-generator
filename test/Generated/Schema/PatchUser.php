<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class PatchUser implements SerializableInterface, JsonSerializable
{
    private ?string $password = null;
    private array $optionalPropertyChanged = array('password' => false);
    /**
     * @param string $password
     * @return self
    */
    public function setPassword(string $password) : self
    {
        $this->password = $password;
        $this->optionalPropertyChanged['password'] = true;
        return $this;
    }
    /**
     * @return bool
    */
    public function hasPassword() : bool
    {
        return $this->optionalPropertyChanged['password'];
    }
    /**
     * @return string|null
    */
    public function getPassword() : ?string
    {
        return $this->password;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        if ($this->hasPassword()) {
            $fields['password'] = $this->password;
        }
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
