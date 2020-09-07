<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $fillable = ['status'];

    public function Supplier_Purchase(){
        return $this->belongsTo(Supplier::class,'supplier_id','id') ;
    }

    public function Unit_Purchase(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function Category_Purchase(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function Product_Purchase(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
