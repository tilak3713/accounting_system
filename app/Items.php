<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    
    protected $table='invoice_items';
    public $timestamps=true;
    public $fillable=['item_name'];
}
