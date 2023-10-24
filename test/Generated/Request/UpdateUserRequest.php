<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\UpdateUser;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class UpdateUserRequest implements RequestInterface
{
    private string $id;
    private UpdateUser $updateUser;
    private string $contentType = 'application/json';
    private ?string $bearerToken = '';
    /**
     * @param string $id
     * @param UpdateUser $updateUser
    */
    public function __construct(string $id, UpdateUser $updateUser)
    {
        $this->id = $id;
        $this->updateUser = $updateUser;
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
        return 'PUT';
    }
    /**
     * @return string
    */
    public function getRoute() : string
    {
        return strtr('user/{id}', array('{id}' => $this->id));
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
     * @return UpdateUser
    */
    public function getBody()
    {
        return $this->updateUser;
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
