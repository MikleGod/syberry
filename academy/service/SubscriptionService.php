<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.41
 */

namespace syberry\academy\service;


use syberry\academy\data\User;
use syberry\academy\exception\FailedCancelSubscriptionKey;
use syberry\academy\exception\NotFoundActiveSubscriptionKey;
use syberry\academy\infrastructure\subscription\SubscriptionGatewayApi;
use syberry\academy\repository\SubscriptionRepository;

class SubscriptionService
{

    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    /**
     * @var SubscriptionGatewayApi
     */
    private $subscriptionGatewayApi;

    /**
     * SubscriptionService constructor.
     */
    public function __construct()
    {
        $this->subscriptionRepository = new SubscriptionRepository();
        $this->subscriptionGatewayApi = new SubscriptionGatewayApi();
    }


    /**
     * @param $user
     * @return void
     * @throws FailedCancelSubscriptionKey
     * @throws NotFoundActiveSubscriptionKey
     */
    public function cancelSubscription(User $user): void
    {
        $activeSubscription = $this->subscriptionRepository->getActiveSubscription($user);
        if (!empty($activeSubscription)) {
            try {
                $this->subscriptionGatewayApi->cancel($activeSubscription->getGatewayId());
            } catch (\Exception $exception) {
                throw new FailedCancelSubscriptionKey();
            }
        } else {
            throw new NotFoundActiveSubscriptionKey();
        }
    }
}
