<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxModel extends Model
{
     protected $table='tax';
    public $timestamps=true;
    public $fillable=['tax_type_code', 'tax_type_name', 'tax_rate'];
}
