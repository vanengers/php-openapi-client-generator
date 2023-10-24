<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Schema\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\LoginCheckPostResponseBody;
use DoclerLabs\ApiClientException\UnexpectedResponseBodyException;

class LoginCheckPostResponseBodyMapper implements SchemaMapperInterface
{
    /**
     * @param array $payload
     * @return LoginCheckPostResponseBody
     * @throws UnexpectedResponseBodyException
    */
    public function toSchema(array $payload) : LoginCheckPostResponseBody
    {
        $missingFields = implode(', ', array_diff(array('token'), array_keys($payload)));
        if (!empty($missingFields)) {
            throw new UnexpectedResponseBodyException('Required attributes for `LoginCheckPostResponseBody` missing in the response body: ' . $missingFields);
        }
        return new LoginCheckPostResponseBody($payload['token']);
    }
}
