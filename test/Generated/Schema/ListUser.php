<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class ListUser implements SerializableInterface, JsonSerializable
{
    private ?int $id = null;
    private ?string $email = null;
    private ?string $roles = null;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;
    private array $optionalPropertyChanged = array('id' => false, 'email' => false, 'roles' => false, 'createdAt' => false, 'updatedAt' => false);
    /**
     * @param int $id
     * @return self
    */
    public function setId(int $id) : self
    {
        $this->id = $id;
        $this->optionalPropertyChanged['id'] = true;
        return $this;
    }
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
     * @param string $roles
     * @return self
    */
    public function setRoles(string $roles) : self
    {
        $this->roles = $roles;
        $this->optionalPropertyChanged['roles'] = true;
        return $this;
    }
    /**
     * @param string $createdAt
     * @return self
    */
    public function setCreatedAt(string $createdAt) : self
    {
        $this->createdAt = $createdAt;
        $this->optionalPropertyChanged['createdAt'] = true;
        return $this;
    }
    /**
     * @param string $updatedAt
     * @return self
    */
    public function setUpdatedAt(string $updatedAt) : self
    {
        $this->updatedAt = $updatedAt;
        $this->optionalPropertyChanged['updatedAt'] = true;
        return $this;
    }
    /**
     * @return bool
    */
    public function hasId() : bool
    {
        return $this->optionalPropertyChanged['id'];
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
     * @return bool
    */
    public function hasCreatedAt() : bool
    {
        return $this->optionalPropertyChanged['createdAt'];
    }
    /**
     * @return bool
    */
    public function hasUpdatedAt() : bool
    {
        return $this->optionalPropertyChanged['updatedAt'];
    }
    /**
     * @return int|null
    */
    public function getId() : ?int
    {
        return $this->id;
    }
    /**
     * @return string|null
    */
    public function getEmail() : ?string
    {
        return $this->email;
    }
    /**
     * @return string|null
    */
    public function getRoles() : ?string
    {
        return $this->roles;
    }
    /**
     * @return string|null
    */
    public function getCreatedAt() : ?string
    {
        return $this->createdAt;
    }
    /**
     * @return string|null
    */
    public function getUpdatedAt() : ?string
    {
        return $this->updatedAt;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        if ($this->hasId()) {
            $fields['id'] = $this->id;
        }
        if ($this->hasEmail()) {
            $fields['email'] = $this->email;
        }
        if ($this->hasRoles()) {
            $fields['roles'] = $this->roles;
        }
        if ($this->hasCreatedAt()) {
            $fields['created_at'] = $this->createdAt;
        }
        if ($this->hasUpdatedAt()) {
            $fields['updated_at'] = $this->updatedAt;
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
