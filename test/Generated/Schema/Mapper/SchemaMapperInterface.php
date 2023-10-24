<?php

declare(strict_types=1);
namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\SerializableInterface;

interface SchemaMapperInterface
{
    /**
     * @return SerializableInterface
     */
    public function toSchema(array $payload);
}
