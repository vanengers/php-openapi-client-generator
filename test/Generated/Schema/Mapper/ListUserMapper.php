<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\ListUser;

class ListUserMapper implements SchemaMapperInterface
{
    /**
     * @param array $payload
     * @return ListUser
    */
    public function toSchema(array $payload) : ListUser
    {
        $schema = new ListUser();
        if (isset($payload['id'])) {
            $schema->setId($payload['id']);
        }
        if (isset($payload['email'])) {
            $schema->setEmail($payload['email']);
        }
        if (isset($payload['roles'])) {
            $schema->setRoles($payload['roles']);
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
