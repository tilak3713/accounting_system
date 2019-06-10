<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseorderModel extends Model
{
    protected $table = 'purchase_order';
    public $timestamps = true;
    public $fillable = ['purchase_date','po_supplier_name','po_supplier_currency','po_closing_date','po_ex_usd_rate','po_ex_aud_rate','po_narration'];
}
