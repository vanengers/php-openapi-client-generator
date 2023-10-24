<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated;

use DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\Mapper\RequestMapperInterface;
use Vanengers\GpWebtechApiPhpClient\Generated\Response\ResponseHandler;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\BodySerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\QuerySerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\ContentType\JsonContentTypeSerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\ContentType\VdnApiJsonContentTypeSerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\ContentType\FormUrlencodedContentTypeSerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\ContentType\XmlContentTypeSerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\Mapper\GuzzleRequestMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListConfigsResponseBodyMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListConfigCollectionMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListConfigMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListUsersResponseBodyMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListUserCollectionMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\ListUserMapper;
use Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper\LoginCheckPostResponseBodyMapper;
use Pimple\Container;

class ServiceProvider
{
    /**
     * @param Container $container
    */
    public function register(Container $container) : void
    {
        $container[BodySerializer::class] = static function () : BodySerializer {
            return (new BodySerializer())->add(new JsonContentTypeSerializer());
        };
        $container[QuerySerializer::class] = static function () : QuerySerializer {
            return new QuerySerializer();
        };
        $container[ResponseHandler::class] = static function () use ($container) : ResponseHandler {
            return new ResponseHandler($container[BodySerializer::class], new ResponseExceptionFactory());
        };
        $container[RequestMapperInterface::class] = static function () use ($container) : RequestMapperInterface {
            return new GuzzleRequestMapper($container[BodySerializer::class], $container[QuerySerializer::class]);
        };
        $container[ListConfigsResponseBodyMapper::class] = static function () use ($container) : ListConfigsResponseBodyMapper {
            return new ListConfigsResponseBodyMapper($container[ListConfigCollectionMapper::class]);
        };
        $container[ListConfigCollectionMapper::class] = static function () use ($container) : ListConfigCollectionMapper {
            return new ListConfigCollectionMapper($container[ListConfigMapper::class]);
        };
        $container[ListConfigMapper::class] = static function () use ($container) : ListConfigMapper {
            return new ListConfigMapper();
        };
        $container[ListUsersResponseBodyMapper::class] = static function () use ($container) : ListUsersResponseBodyMapper {
            return new ListUsersResponseBodyMapper($container[ListUserCollectionMapper::class]);
        };
        $container[ListUserCollectionMapper::class] = static function () use ($container) : ListUserCollectionMapper {
            return new ListUserCollectionMapper($container[ListUserMapper::class]);
        };
        $container[ListUserMapper::class] = static function () use ($container) : ListUserMapper {
            return new ListUserMapper();
        };
        $container[LoginCheckPostResponseBodyMapper::class] = static function () use ($container) : LoginCheckPostResponseBodyMapper {
            return new LoginCheckPostResponseBodyMapper();
        };
    }
}
