<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\CreateConfig;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class CreateConfigRequest implements RequestInterface
{
    private CreateConfig $createConfig;
    private string $contentType = 'application/json';
    private ?string $bearerToken = '';
    /**
     * @param CreateConfig $createConfig
    */
    public function __construct(CreateConfig $createConfig)
    {
        $this->createConfig = $createConfig;
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
        return 'config';
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
     * @return CreateConfig
    */
    public function getBody()
    {
        return $this->createConfig;
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
