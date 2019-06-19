<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AccountGroupModel extends Model
{
  
    protected $table='account_group';
    public $timestamps=true;
    public $fillable=['group_name', 'group_type', 'position'];
}
