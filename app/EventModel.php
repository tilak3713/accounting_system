<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'event';
    public $timestamps = true;
    public $fillable = ['event_date','event_name','event_description'];
}
