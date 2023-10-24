<?php

declare(strict_types=1);
namespace Vanengers\GpWebtechApiPhpClient\Generated\Response;

use DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory;
use DoclerLabs\ApiClientException\UnexpectedResponseException;
use Vanengers\GpWebtechApiPhpClient\Generated\Serializer\BodySerializer;
use Psr\Http\Message\ResponseInterface;

class ResponseHandler
{
    /** @var BodySerializer */
    private $bodySerializer;
    /** @var ResponseExceptionFactory */
    private $responseExceptionFactory;
    public function __construct(BodySerializer $bodySerializer, ResponseExceptionFactory $exceptionFactory)
    {
        $this->bodySerializer = $bodySerializer;
        $this->responseExceptionFactory = $exceptionFactory;
    }
    /**
     * @throws UnexpectedResponseException
     */
    public function handle(ResponseInterface $response) : array
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode >= 200 && $statusCode < 300) {
            return $this->bodySerializer->unserializeResponse($response);
        }
        throw $this->responseExceptionFactory->create(sprintf('Server replied with a non-200 status code: %s', $response->getStatusCode()), $response);
    }
}
