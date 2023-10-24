<?php

namespace Vanengers\GpWebtechApiPhpClient\Generated\Request;

use Vanengers\GpWebtechApiPhpClient\Generated\Request\AuthenticationCredentials;

class GetConfigRequest implements RequestInterface
{
    private string $domain;
    private string $key;
    private string $contentType = '';
    private ?string $bearerToken = '';
    /**
     * @param string $domain
     * @param string $key
    */
    public function __construct(string $domain, string $key)
    {
        $this->domain = $domain;
        $this->key = $key;
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
        return 'GET';
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
        return array('Authorization' => sprintf('Bearer %s', $this->bearerToken));
    }
    public function getBody()
    {
        return null;
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
