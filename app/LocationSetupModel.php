<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationSetupModel extends Model
{
    protected $table = 'location_setup';
    public $timestamps = true;
    public $fillable = ['id','location_name','region','company_id_fk'];
}
