<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface PaymentOrderRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function customerPaymentInfoByOrgId($orgId);
    public function paymentOrderInfo();
}
