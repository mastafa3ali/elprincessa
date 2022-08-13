<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\SubscriptionRepoInterface;
use App\Http\Repositories\Eloquent\AbstractRepo;
use App\Models\Subscription;



class SubscriptionRepo extends AbstractRepo implements SubscriptionRepoInterface
{
    public function __construct()
    {
        parent::__construct(Subscription::class);
    }



}
