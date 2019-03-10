<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.31
 */

namespace syberry\academy\data\subscription;


class SubscriptionPlan
{
    const FREE = 1;
    const PAID = 2;

    private $id;

    /**
     * SubscriptionPlan constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}