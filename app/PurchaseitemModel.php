<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseitemModel extends Model
{
    protected $table = 'purchase_item';
    public $timestamps = true;
    public $fillable = ['po_id','pi_booking_reference','pi_supplier_amount','pi_amount'];
}
