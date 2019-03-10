<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.38
 */

namespace syberry\academy\controller;


use syberry\academy\data\User;
use syberry\academy\exception\FailedCancelSubscriptionKey;
use syberry\academy\exception\NotFoundActiveSubscriptionKey;
use syberry\academy\infrastructure\http\Response;
use syberry\academy\service\SubscriptionService;

class SubscriptionController
{
    const OK_RESPONSE_CODE = 200;
    const FAILED_OPERATION_CODE = 422;
    const NOT_FOUND_CODE = 404;

    const FAILED_OPERATION_MESSAGE = 'The subscription wasn\'t cancelled due to technical issue';
    const NOT_FOUND_MESSAGE = 'Subscription is not found for user';

    private $subscriptionService;

    /**
     * SubscriptionController constructor.
     */
    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService();
    }


    public function cancelSubscriptionForUser($userId)
    {
        $user = new User($userId);

        try {
            $this->subscriptionService->cancelSubscription($user);
            $response = new Response(self::OK_RESPONSE_CODE);
        } catch (FailedCancelSubscriptionKey $e) {
            http_response_code(self::FAILED_OPERATION_CODE);
            $response = new Response(self::FAILED_OPERATION_CODE, [
                'message' => self::FAILED_OPERATION_MESSAGE
            ]);
        } catch (NotFoundActiveSubscriptionKey $e) {
            http_response_code(self::NOT_FOUND_CODE);
            $response = new Response(self::NOT_FOUND_CODE, [
                'message' => self::NOT_FOUND_MESSAGE
            ]);
        }
        return $response;
    }
}