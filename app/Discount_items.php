<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_items extends Model
{
    Protected $table = 'discount_item';
    public $timestamps = true;
    public $filable = ['account_discount_id','item_description','discount_amount','discount_percent'];
}
