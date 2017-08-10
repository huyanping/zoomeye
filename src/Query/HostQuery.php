<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 13:43
 */

namespace Vincent\Zoomeye\Query;


class HostQuery extends AbstractQuery
{

    public function setApp($app, $version = null)
    {
        $this->query['app'] = $app;
        if (!is_null($version)) {
            $this->query['ver'] = $version;
        }
    }

    public function setPort($port)
    {
        $this->query['port'] = $port;
    }

    public function setService($service)
    {
        $this->query['service'] = $service;
    }

    public function setHostname($hostname)
    {
        $this->query['hostname'] = $hostname;
    }

    public function setIp($ip)
    {
        $this->query['ip'] = $ip;
    }

    public function setCIRD($cird)
    {
        $this->query['cird'] = $cird;
    }

    public function setSite($site)
    {
        $this->query['site'] = $site;
    }

    public function setHeaders($headers)
    {
        $this->query['headers'] = $headers;
    }

    public function setKeywords($keywords)
    {
        $this->query['keywords'] = $keywords;
    }

    public function setDesc($desc)
    {
        $this->query['desc'] = $desc;
    }

    public function setTitle($title)
    {
        $this->query['title'] = $title;
    }
}