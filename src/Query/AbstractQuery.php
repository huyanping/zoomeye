<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/5/25
 * Time: 14:07
 */

namespace Vincent\Zoomeye\Query;


class AbstractQuery
{
    /**
     * @var array
     */
    protected $query = [];

    protected $main_word;

    public function setCountry($country, $city = null)
    {
        $this->query['country'] = $country;
        if (!is_null($city)) {
            $this->query['city'] = $city;
        }
    }

    public function setOs($os)
    {
        $this->query['os'] = $os;
    }

    public function setMainWord($main_word)
    {
        $this->main_word = $main_word;
    }

    public function toQueryString()
    {
        $query_string = '"' . $this->main_word . ' ' . implode($this->query, ' ') . '"';
        return $query_string;
    }
}