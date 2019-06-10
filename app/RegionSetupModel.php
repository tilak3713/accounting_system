<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionSetupModel extends Model
{
    protected $table = 'region_setup';
    public $timestamps = true;
    public $fillable = ['id','region_name'];
}
