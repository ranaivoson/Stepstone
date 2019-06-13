<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 06/02/2019
 * Time: 16:28
 */

namespace App\Storage;


class GetValue
{
    private $key;

    /**
     * GetValue constructor.
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }
}