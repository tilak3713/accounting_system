<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    
    protected $table='expenses';
    public $timestamps=true;
    public $fillable=['cash_or_bank_ac', 'narration', 'account', 'tax_type', 'amount_without_tax', 'tax_amount', 'amount_with_tax'];

}
