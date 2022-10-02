<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    protected $fillable = [
        'date', 'invoice_id' ,'category_id','product_id','selling_qty','unit_price','selling_price','status'
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }
}
