<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class UpdateUser implements SerializableInterface, JsonSerializable
{
    private ?string $email = null;
    private ?array $roles = null;
    private array $optionalPropertyChanged = array('email' => false, 'roles' => false);
    /**
     * @param string $email
     * @return self
    */
    public function setEmail(string $email) : self
    {
        $this->email = $email;
        $this->optionalPropertyChanged['email'] = true;
        return $this;
    }
    /**
     * @param string[] $roles
     * @return self
    */
    public function setRoles(array $roles) : self
    {
        $this->roles = $roles;
        $this->optionalPropertyChanged['roles'] = true;
        return $this;
    }
    /**
     * @return bool
    */
    public function hasEmail() : bool
    {
        return $this->optionalPropertyChanged['email'];
    }
    /**
     * @return bool
    */
    public function hasRoles() : bool
    {
        return $this->optionalPropertyChanged['roles'];
    }
    /**
     * @return string|null
    */
    public function getEmail() : ?string
    {
        return $this->email;
    }
    /**
     * @return string[]|null
    */
    public function getRoles() : ?array
    {
        return $this->roles;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        if ($this->hasEmail()) {
            $fields['email'] = $this->email;
        }
        if ($this->hasRoles()) {
            $fields['roles'] = $this->roles;
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
