<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\ListConfig;

class ListConfigMapper implements SchemaMapperInterface
{
    /**
     * @param array $payload
     * @return ListConfig
    */
    public function toSchema(array $payload) : ListConfig
    {
        $schema = new ListConfig();
        if (isset($payload['id'])) {
            $schema->setId($payload['id']);
        }
        if (isset($payload['key'])) {
            $schema->setKey($payload['key']);
        }
        if (isset($payload['domain'])) {
            $schema->setDomain($payload['domain']);
        }
        if (isset($payload['value'])) {
            $schema->setValue($payload['value']);
        }
        if (isset($payload['created_at'])) {
            $schema->setCreatedAt($payload['created_at']);
        }
        if (isset($payload['updated_at'])) {
            $schema->setUpdatedAt($payload['updated_at']);
        }
        return $schema;
    }
}
