<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Discount_Periods_Setup extends Model
{

    protected $table='discount_periods';
    public $timestamps=true;
    public $fillable=['id','description','start_date','end_date','sales_budget'];
}
