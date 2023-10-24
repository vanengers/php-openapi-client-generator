<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class ListConfig implements SerializableInterface, JsonSerializable
{
    private ?int $id = null;
    private ?string $key = null;
    private ?string $domain = null;
    private ?string $value = null;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;
    private array $optionalPropertyChanged = array('id' => false, 'key' => false, 'domain' => false, 'value' => false, 'createdAt' => false, 'updatedAt' => false);
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
     * @param string $key
     * @return self
    */
    public function setKey(string $key) : self
    {
        $this->key = $key;
        $this->optionalPropertyChanged['key'] = true;
        return $this;
    }
    /**
     * @param string $domain
     * @return self
    */
    public function setDomain(string $domain) : self
    {
        $this->domain = $domain;
        $this->optionalPropertyChanged['domain'] = true;
        return $this;
    }
    /**
     * @param string $value
     * @return self
    */
    public function setValue(string $value) : self
    {
        $this->value = $value;
        $this->optionalPropertyChanged['value'] = true;
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
    public function hasKey() : bool
    {
        return $this->optionalPropertyChanged['key'];
    }
    /**
     * @return bool
    */
    public function hasDomain() : bool
    {
        return $this->optionalPropertyChanged['domain'];
    }
    /**
     * @return bool
    */
    public function hasValue() : bool
    {
        return $this->optionalPropertyChanged['value'];
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
    public function getKey() : ?string
    {
        return $this->key;
    }
    /**
     * @return string|null
    */
    public function getDomain() : ?string
    {
        return $this->domain;
    }
    /**
     * @return string|null
    */
    public function getValue() : ?string
    {
        return $this->value;
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
        if ($this->hasKey()) {
            $fields['key'] = $this->key;
        }
        if ($this->hasDomain()) {
            $fields['domain'] = $this->domain;
        }
        if ($this->hasValue()) {
            $fields['value'] = $this->value;
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
