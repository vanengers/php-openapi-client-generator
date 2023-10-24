<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use Countable;
use IteratorAggregate;
use JsonSerializable;
use ArrayIterator;

class ListConfigCollection implements IteratorAggregate, SerializableInterface, Countable, JsonSerializable
{
    private array $items;
    /**
     * @param ListConfig[] $items
    */
    public function __construct(ListConfig ...$items)
    {
        $this->items = $items;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $return = array();
        foreach ($this->items as $item) {
            $return[] = $item->toArray();
        }
        return $return;
    }
    /**
     * @return array
    */
    public function jsonSerialize() : array
    {
        return $this->toArray();
    }
    /**
     * @return ListConfig[]
    */
    public function getIterator() : ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
    /**
     * @return int
    */
    public function count() : int
    {
        return count($this->items);
    }
    /**
     * @return ListConfig|null
    */
    public function first() : ?ListConfig
    {
        $first = reset($this->items);
        if ($first === false) {
            return null;
        }
        return $first;
    }
}
