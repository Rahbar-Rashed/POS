<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = [
        'invoice_id', 'current_paid_amount' ,'date','updated_by'
    ];
}
