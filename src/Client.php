<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 12:23
 */

namespace Vincent\Zoomeye;


use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Vincent\Zoomeye\Query\HostQuery;
use Vincent\Zoomeye\Query\WebQuery;

class Client
{
    protected $http;
    protected $token;
    protected $urls;

    public function __construct(array $config)
    {
        $this->http = new \GuzzleHttp\Client();
        $this->urls = $config['urls'];
    }

    public function login($username, $password)
    {
        $url = $this->urls['login'];
        $body = json_encode([
            'username' => $username,
            'password' => $password,
        ]);
        $request = new Request('POST', $url, [], $body);
        $response = $this->http->send($request);
        $this->checkResponse($response);
        return json_decode($response->getBody(), true);
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function resourceInfo()
    {
        $url = $this->urls['resource-info'];
        $headers = [
            'Authorization' => 'JWT ' . $this->token,
        ];
        $request = new Request('GET', $url, $headers);
        $response = $this->http->send($request);
        $this->checkResponse($response);
        return json_decode($response->getBody(), true);
    }

    public function hostSearch(HostQuery $query, $page = 1, $facets = null)
    {
        $headers = [
            'Authorization' => 'JWT ' . $this->token,
        ];
        $params = [
            'query' => $query->toQueryString(),
            'page' => $page,
        ];
        if (!is_null($facets)) {
            $params['facets'] = $facets;
        }
        $url = $this->urls['host-search'] . '?' . http_build_query($params);
        $request = new Request('GET', $url, $headers);
        $response = $this->http->send($request);
        $this->checkResponse($response);

        return json_decode($response->getBody(), true);
    }

    public function webSearch(WebQuery $query, $page = 1, $facets = null)
    {
        $headers = [
            'Authorization' => 'JWT ' . $this->token,
        ];
        $params = [
            'query' => $query->toQueryString(),
            'page' => $page,
        ];
        if (!is_null($facets)) {
            $params['facets'] = $facets;
        }
        $url = $this->urls['web-search'] . '?' . http_build_query($params);
        $request = new Request('GET', $url, $headers);
        $response = $this->http->send($request);
        $this->checkResponse($response);

        return json_decode($response->getBody(), true);
    }

    public function checkResponse(Response $response)
    {
        if ($response->getStatusCode() != 200 && $response->getStatusCode() != 201) {
            throw new \RuntimeException($response->getBody());
        }
    }
}