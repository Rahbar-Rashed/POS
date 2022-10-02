<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'supplier_id','unit_id' ,'category_id', 'name','quantity','status','created_by','updated_by'
    ];

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function unit(){
    	return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
}