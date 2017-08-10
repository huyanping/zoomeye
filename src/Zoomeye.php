<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 12:19
 */

namespace Vincent\Zoomeye;


class Zoomeye
{
    public static function create()
    {
        $config = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config.php';
        return new Client($config);
    }
}