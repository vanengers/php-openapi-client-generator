<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema;

use JsonSerializable;

class ListConfigsResponseBody implements SerializableInterface, JsonSerializable
{
    private ?int $total = null;
    private ?int $count = null;
    private ?int $offset = null;
    private ?int $itemsPerPage = null;
    private ?int $totalPages = null;
    private ?int $currentPage = null;
    private ?bool $hasNextPage = null;
    private ?bool $hasPreviousPage = null;
    private ?ListConfigCollection $data = null;
    private array $optionalPropertyChanged = array('total' => false, 'count' => false, 'offset' => false, 'itemsPerPage' => false, 'totalPages' => false, 'currentPage' => false, 'hasNextPage' => false, 'hasPreviousPage' => false, 'data' => false);
    /**
     * @param int $total
     * @return self
    */
    public function setTotal(int $total) : self
    {
        $this->total = $total;
        $this->optionalPropertyChanged['total'] = true;
        return $this;
    }
    /**
     * @param int $count
     * @return self
    */
    public function setCount(int $count) : self
    {
        $this->count = $count;
        $this->optionalPropertyChanged['count'] = true;
        return $this;
    }
    /**
     * @param int $offset
     * @return self
    */
    public function setOffset(int $offset) : self
    {
        $this->offset = $offset;
        $this->optionalPropertyChanged['offset'] = true;
        return $this;
    }
    /**
     * @param int $itemsPerPage
     * @return self
    */
    public function setItemsPerPage(int $itemsPerPage) : self
    {
        $this->itemsPerPage = $itemsPerPage;
        $this->optionalPropertyChanged['itemsPerPage'] = true;
        return $this;
    }
    /**
     * @param int $totalPages
     * @return self
    */
    public function setTotalPages(int $totalPages) : self
    {
        $this->totalPages = $totalPages;
        $this->optionalPropertyChanged['totalPages'] = true;
        return $this;
    }
    /**
     * @param int $currentPage
     * @return self
    */
    public function setCurrentPage(int $currentPage) : self
    {
        $this->currentPage = $currentPage;
        $this->optionalPropertyChanged['currentPage'] = true;
        return $this;
    }
    /**
     * @param bool $hasNextPage
     * @return self
    */
    public function setHasNextPage(bool $hasNextPage) : self
    {
        $this->hasNextPage = $hasNextPage;
        $this->optionalPropertyChanged['hasNextPage'] = true;
        return $this;
    }
    /**
     * @param bool $hasPreviousPage
     * @return self
    */
    public function setHasPreviousPage(bool $hasPreviousPage) : self
    {
        $this->hasPreviousPage = $hasPreviousPage;
        $this->optionalPropertyChanged['hasPreviousPage'] = true;
        return $this;
    }
    /**
     * @param ListConfigCollection $data
     * @return self
    */
    public function setData(ListConfigCollection $data) : self
    {
        $this->data = $data;
        $this->optionalPropertyChanged['data'] = true;
        return $this;
    }
    /**
     * @return bool
    */
    public function hasTotal() : bool
    {
        return $this->optionalPropertyChanged['total'];
    }
    /**
     * @return bool
    */
    public function hasCount() : bool
    {
        return $this->optionalPropertyChanged['count'];
    }
    /**
     * @return bool
    */
    public function hasOffset() : bool
    {
        return $this->optionalPropertyChanged['offset'];
    }
    /**
     * @return bool
    */
    public function hasItemsPerPage() : bool
    {
        return $this->optionalPropertyChanged['itemsPerPage'];
    }
    /**
     * @return bool
    */
    public function hasTotalPages() : bool
    {
        return $this->optionalPropertyChanged['totalPages'];
    }
    /**
     * @return bool
    */
    public function hasCurrentPage() : bool
    {
        return $this->optionalPropertyChanged['currentPage'];
    }
    /**
     * @return bool
    */
    public function hasHasNextPage() : bool
    {
        return $this->optionalPropertyChanged['hasNextPage'];
    }
    /**
     * @return bool
    */
    public function hasHasPreviousPage() : bool
    {
        return $this->optionalPropertyChanged['hasPreviousPage'];
    }
    /**
     * @return bool
    */
    public function hasData() : bool
    {
        return $this->optionalPropertyChanged['data'];
    }
    /**
     * @return int|null
    */
    public function getTotal() : ?int
    {
        return $this->total;
    }
    /**
     * @return int|null
    */
    public function getCount() : ?int
    {
        return $this->count;
    }
    /**
     * @return int|null
    */
    public function getOffset() : ?int
    {
        return $this->offset;
    }
    /**
     * @return int|null
    */
    public function getItemsPerPage() : ?int
    {
        return $this->itemsPerPage;
    }
    /**
     * @return int|null
    */
    public function getTotalPages() : ?int
    {
        return $this->totalPages;
    }
    /**
     * @return int|null
    */
    public function getCurrentPage() : ?int
    {
        return $this->currentPage;
    }
    /**
     * @return bool|null
    */
    public function getHasNextPage() : ?bool
    {
        return $this->hasNextPage;
    }
    /**
     * @return bool|null
    */
    public function getHasPreviousPage() : ?bool
    {
        return $this->hasPreviousPage;
    }
    /**
     * @return ListConfigCollection|null
    */
    public function getData() : ?ListConfigCollection
    {
        return $this->data;
    }
    /**
     * @return array
    */
    public function toArray() : array
    {
        $fields = array();
        if ($this->hasTotal()) {
            $fields['total'] = $this->total;
        }
        if ($this->hasCount()) {
            $fields['count'] = $this->count;
        }
        if ($this->hasOffset()) {
            $fields['offset'] = $this->offset;
        }
        if ($this->hasItemsPerPage()) {
            $fields['items_per_page'] = $this->itemsPerPage;
        }
        if ($this->hasTotalPages()) {
            $fields['total_pages'] = $this->totalPages;
        }
        if ($this->hasCurrentPage()) {
            $fields['current_page'] = $this->currentPage;
        }
        if ($this->hasHasNextPage()) {
            $fields['has_next_page'] = $this->hasNextPage;
        }
        if ($this->hasHasPreviousPage()) {
            $fields['has_previous_page'] = $this->hasPreviousPage;
        }
        if ($this->hasData()) {
            $fields['data'] = $this->data->toArray();
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
