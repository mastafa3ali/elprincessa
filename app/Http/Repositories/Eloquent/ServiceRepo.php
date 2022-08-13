<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\ServiceRepoInterface;
use App\Http\Repositories\Eloquent\AbstractRepo;
use App\Models\Service;



class ServiceRepo extends AbstractRepo implements ServiceRepoInterface
{
    public function __construct()
    {
        parent::__construct(Service::class);
    }



}
