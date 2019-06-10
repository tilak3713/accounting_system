<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSetupModel extends Model
{
   protected $table = 'customer_setup';
   public $timestamps = true;
   public $fillable = ['id','title','cus_name','cus_email','contact_no','parent_acc','location_id_fk','tax_type_id','additional_info'];
}
