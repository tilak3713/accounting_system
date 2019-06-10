<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountrySetupModel extends Model
{
    protected $table = 'country_setup';
    public $timestamps = true;
    public $fillable = ['id','country_name','currency_code','currency_symbol'];
}
