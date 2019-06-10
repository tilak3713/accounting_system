<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySetupModel extends Model
{
    protected $table = "category_setup";
    public $timestamps = true;
    public $fillable =['id','category_name','status'];
}
