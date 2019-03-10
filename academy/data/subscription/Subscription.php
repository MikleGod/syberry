<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.30
 */

namespace syberry\academy\data\subscription;



class Subscription
{


    /**
     * @var SubscriptionPlan
     */
    private $plan;

    /**
     * @var integer
     */
    private $gatewayId;

    /**
     * Subscription constructor.
     * @param $planId int
     */
    public function __construct($id)
    {
        $this->plan = new SubscriptionPlan($id);
        $this->gatewayId = $id;
    }


    /**
     * @return SubscriptionPlan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @return int
     */
    public function getGatewayId()
    {
        return $this->gatewayId;
    }
}