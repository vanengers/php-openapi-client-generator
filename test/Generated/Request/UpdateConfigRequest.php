<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\UpdateConfig;
use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class UpdateConfigRequest implements RequestInterface
{
    private string $domain;
    private string $key;
    private UpdateConfig $updateConfig;
    private string $contentType = 'application/json';
    private ?string $bearerToken = '';
    /**
     * @param string $domain
     * @param string $key
     * @param UpdateConfig $updateConfig
    */
    public function __construct(string $domain, string $key, UpdateConfig $updateConfig)
    {
        $this->domain = $domain;
        $this->key = $key;
        $this->updateConfig = $updateConfig;
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
        return strtr('config/{domain}/{key}', array('{domain}' => $this->domain, '{key}' => $this->key));
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
     * @return UpdateConfig
    */
    public function getBody()
    {
        return $this->updateConfig;
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
