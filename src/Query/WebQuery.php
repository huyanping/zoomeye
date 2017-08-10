<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 13:43
 */

namespace Vincent\Zoomeye\Query;


class WebQuery extends AbstractQuery
{
    public function setWebApp($webapp)
    {
        $this->query['webapp'] = $webapp;
    }

    public function setComponent($component)
    {
        $this->query['component'] = $component;
    }

    public function setFramework($framework)
    {
        $this->query['framework'] = $framework;
    }

    public function setServer($server)
    {
        $this->query['server'] = $server;
    }

    public function setWaf($waf)
    {
        $this->query['waf'] = $waf;
    }
}