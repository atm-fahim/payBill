<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface PaymentReportsRepo extends EloquentRepositoryInterface{
    public function paymentCustomerOrderInfo($params);
}
