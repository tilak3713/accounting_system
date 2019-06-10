<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    public $timestamps = true;
    public $fillable = ['contact_name','contact_phone','contact_mobile','contact_address'];
}
