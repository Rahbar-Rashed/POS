<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no','date', 'description' ,'status','created_by','approved_by'
    ];

    public function payment(){
    	return $this->hasOne(payment::class,'invoice_id','id');
    }

    public function invoice_details(){
    	return $this->hasMany(InvoiceDetails::class, 'invoice_id','id');
    }

}
