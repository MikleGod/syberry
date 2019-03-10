<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 10.3.19
 * Time: 16.39
 */

namespace syberry\academy\exception;


class FailedCancelSubscriptionKey extends \Exception
{

    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}