<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\PatchUser;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class UpdateUserPasswordRequest implements RequestInterface
{
    private string $id;
    private PatchUser $patchUser;
    private string $contentType = 'application/json';
    private ?string $bearerToken = '';
    /**
     * @param string $id
     * @param PatchUser $patchUser
    */
    public function __construct(string $id, PatchUser $patchUser)
    {
        $this->id = $id;
        $this->patchUser = $patchUser;
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
        return 'PATCH';
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
     * @return PatchUser
    */
    public function getBody()
    {
        return $this->patchUser;
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
