<?php

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class SampleClient extends ApiClient
{
    /** @var string $username */
    private $username;
    /** @var string $password */
    private $password;
    /** @var callable|null $saveToken */
    private $saveToken;
    /**
     * @param $username
     * @param $password
     * @param ContainerInterface $container
     * @param $base_uri
     * @param $token
     * @param callable|null $saveToken
     */
    public function __construct($username, $password, $base_uri = '', $token = null, callable $saveToken = null)
    {
        $guzzle = new Client(['base_uri' => !empty($base_uri) ? $base_uri : 'https://sample_default_url.com/']);
        $this->username = $username;
        $this->password = $password;
        parent::__construct($guzzle);
        $this->setToken(!is_null($token) ? $token : '');
        $this->saveToken = $saveToken;
        if (empty($token)) {
            $this->login();
        }
    }
    /**
     * @return void
     */
    public function login()
    {
        $result = $this->login_check_post(new LoginCheckPostRequest(new LoginCheckPostRequestBody($this->username, $this->password)));
        $this->setToken($result->getToken());
        if ($this->saveToken) {
            try {
                $saveToken = $this->saveToken;
                $saveToken($this->getToken());
            } catch (Throwable $e) {
                // the actual callable call can be undefined, we don't know anything.
                // So the actual callback can throw an exception, we don't care, just don't save the token externally
            }
        }
    }
}
