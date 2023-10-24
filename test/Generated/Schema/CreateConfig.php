<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class CreateConfig implements SerializableInterface, JsonSerializable
{
    private ?string $key = null;
    private ?string $domain = null;
    private ?string $value = null;
    private array $optionalPropertyChanged = array('key' => false, 'domain' => false, 'value' => false);
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
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        if ($this->hasKey()) {
            $fields['key'] = $this->key;
        }
        if ($this->hasDomain()) {
            $fields['domain'] = $this->domain;
        }
        if ($this->hasValue()) {
            $fields['value'] = $this->value;
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
