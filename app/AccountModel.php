<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
   protected $table='account';
    public $timestamps=true;
    public $fillable=['account_name', 'account_group', 'parent_account', 'advance_account', 'account_additional_info'];
}
