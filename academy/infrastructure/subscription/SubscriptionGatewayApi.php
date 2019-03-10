<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.36
 */

namespace syberry\academy\infrastructure\subscription;


class SubscriptionGatewayApi
{

    /**
     * @param $id
     * @throws \Exception
     */
    public function cancel($id)
    {
        if ($id % 101 == 0) {
            throw new \Exception();
        }
    }
}