<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.42
 */

namespace syberry\academy\repository;


use syberry\academy\data\subscription\Subscription;
use syberry\academy\data\User;

class SubscriptionRepository
{
    public function getActiveSubscription(User $user)
    {
        // emulate case
        if ($user->getId() % 10) {
            // Just a stub
            return new Subscription($user->getId());
        } else {
            return null;
        }
    }
}