<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPaymentModel extends Model
{
    protected $table = 'customer_payment';
    public $timestamps = true;
    public $guarded=[];

}
