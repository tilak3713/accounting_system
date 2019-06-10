<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItemModel extends Model
{
   protected $table = 'invoice_item';
   public $timestamps = true;
   public $fillable =['id','item_name','is_tour','exclude_from_discounts','status','company_id_fk'];
}
