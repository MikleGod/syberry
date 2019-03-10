<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.29
 */

namespace syberry\academy\data;



class User
{
    private $id;

    /**
     * User constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}