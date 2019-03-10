<?php

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

class SubscriptionGatewayApi
{

    /**
     * @param $id
     * @throws Exception
     */
    public function cancel($id)
    {
        if ($id % 101 == 0) {
            throw new Exception();
        }
    }
}

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
    public function cancelSubscription($user): void
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

class FailedCancelSubscriptionKey extends Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}

class NotFoundActiveSubscriptionKey extends Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}