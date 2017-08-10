<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 15:10
 */

namespace Vincent\Zoomeye\Test;


use Vincent\Zoomeye\Client;
use Vincent\Zoomeye\Query\HostQuery;
use Vincent\Zoomeye\Query\WebQuery;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    protected static $client;

    public static function setUpBeforeClass()
    {
        $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config.php';
        self::$client = new Client($config);
        $response = self::$client->login("hypxm@qq.com", '1990913326');
        self::$client->setToken($response['access_token']);
    }

    public function testLogin()
    {
        $config = include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config.php';
        $client = new Client($config);
        $response = $client->login("hypxm@qq.com", '1990913326');
        $this->assertTrue(array_key_exists('access_token', $response));
    }

    public function testResourceInfo()
    {
        $response = self::$client->resourceInfo();
        $this->assertTrue(array_key_exists('plan', $response));
        $this->assertTrue(array_key_exists('resources', $response));
        $this->assertTrue(array_key_exists('host-search', $response['resources']));
        $this->assertTrue(array_key_exists('web-search', $response['resources']));
    }

    public function testWebSearch()
    {
        $query = new WebQuery();
        $query->setFramework("ThinkPHP");
        $response = self::$client->webSearch($query);
        $this->assertTrue(array_key_exists('total', $response));
    }

    public function testHostSearch()
    {
        $query = new HostQuery();
        $query->setPort("6379");
        $response = self::$client->hostSearch($query);
        $this->assertTrue(array_key_exists('total', $response));
    }
}