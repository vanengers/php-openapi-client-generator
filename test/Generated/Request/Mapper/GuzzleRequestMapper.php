<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\BodySerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\QuerySerializer;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\CookieJar;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\RequestInterface;

class GuzzleRequestMapper implements RequestMapperInterface
{
    private BodySerializer $bodySerializer;
    private QuerySerializer $querySerializer;
    /**
     * @param BodySerializer $bodySerializer
     * @param QuerySerializer $querySerializer
    */
    public function __construct(BodySerializer $bodySerializer, QuerySerializer $querySerializer)
    {
        $this->bodySerializer = $bodySerializer;
        $this->querySerializer = $querySerializer;
    }
    /**
     * @param RequestInterface $request
     * @return PsrRequestInterface
    */
    public function map(RequestInterface $request) : PsrRequestInterface
    {
        $body = $this->bodySerializer->serializeRequest($request);
        $query = $this->querySerializer->serializeRequest($request);
        $psr7Request = new Request($request->getMethod(), $request->getRoute(), $request->getHeaders(), $body, '1.1');
        $psr7Request = $psr7Request->withUri($psr7Request->getUri()->withQuery($query));
        $cookieJar = new CookieJar($request->getCookies());
        $psr7Request = $cookieJar->withCookieHeader($psr7Request);
        return $psr7Request;
    }
}
