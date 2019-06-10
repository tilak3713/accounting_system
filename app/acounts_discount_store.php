<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acounts_discount_store extends Model
{
    protected $table='accounts_discount';
    public $timestamps=true;
    public $fillable=['discount_period','account_name','discount_type'];
}
