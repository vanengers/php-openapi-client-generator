<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\ListUserCollection;

class ListUserCollectionMapper implements SchemaMapperInterface
{
    private ListUserMapper $listUserMapper;
    /**
     * @param ListUserMapper $listUserMapper
    */
    public function __construct(ListUserMapper $listUserMapper)
    {
        $this->listUserMapper = $listUserMapper;
    }
    /**
     * @param array $payload
     * @return ListUserCollection
    */
    public function toSchema(array $payload) : ListUserCollection
    {
        $items = array();
        foreach ($payload as $payloadItem) {
            $items[] = $this->listUserMapper->toSchema($payloadItem);
        }
        return new ListUserCollection(...$items);
    }
}
