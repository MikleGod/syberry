<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.37
 */

namespace syberry\academy\infrastructure\http;



class Response
{
    /**
     * @var integer
     */
    private $code;

    private $data;

    /**
     * Response constructor.
     * @param int $code
     * @param $data
     */
    public function __construct($code, $data = [])
    {
        $this->code = $code;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}