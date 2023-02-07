<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public $table = "prebuild_checkout_payment";
    protected $fillable = [

        'customer_name',
        'customer_gender',
        'email',
        'birth',
        'cis',
        'grade',
        'phone',
        'name1',
        'nrc1',
        'name2',
        'nrc2',
        'occupation',
        'sibling_num',
        'sibling',
        'guardian',
        'viber',
        'states',
        'address',
        'order_id',
        'amount',
        'total_amount',
        'remark',
        'transaction_status'
    
        ];
}
