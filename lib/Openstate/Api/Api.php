<?php

namespace Openstate\Api;

use Openstate\Client;

abstract class Api
{
    protected $baseUrl = 'http://openstates.org/api/v1/';
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Sends api request
     *
     * @param   string  $path
     * @param   array   $parameters
     * @return  array
     **/
    public function request($path, $params=array())
    {
        $_params = '';

        foreach ($params as $k => $v) {
            $_params .= $k .'=' . $v . '&';
        }

        $apiUrl  = $this->baseUrl . $path . '/?' . $_params . 'apikey=' . $this->client->apiKey;
        $apiData = json_decode(file_get_contents($apiUrl));

        return $apiData;
    }
}