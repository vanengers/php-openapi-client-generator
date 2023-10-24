<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\CreateUser;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class CreateUserRequest implements RequestInterface
{
    private CreateUser $createUser;
    private string $contentType = 'application/json';
    private ?string $bearerToken = '';
    /**
     * @param CreateUser $createUser
    */
    public function __construct(CreateUser $createUser)
    {
        $this->createUser = $createUser;
    }
    /**
     * @return string
    */
    public function getContentType() : string
    {
        return $this->contentType;
    }
    /**
     * @return string
    */
    public function getMethod() : string
    {
        return 'POST';
    }
    /**
     * @return string
    */
    public function getRoute() : string
    {
        return 'user';
    }
    /**
     * @return array
    */
    public function getQueryParameters() : array
    {
        return array();
    }
    /**
     * @return array
    */
    public function getRawQueryParameters() : array
    {
        return array();
    }
    /**
     * @return array
    */
    public function getCookies() : array
    {
        return array();
    }
    /**
     * @return array
    */
    public function getHeaders() : array
    {
        return array('Authorization' => sprintf('Bearer %s', $this->bearerToken), 'Content-Type' => $this->contentType);
    }
    /**
     * @return CreateUser
    */
    public function getBody()
    {
        return $this->createUser;
    }
    /**
     * @param string|null $bearerToken
     * @return self
    */
    public function setBearerToken(?string $bearerToken) : self
    {
        $this->bearerToken = $bearerToken;
        return $this;
    }
    public function getBearerToken() : string
    {
        return $this->bearerToken;
    }
}
