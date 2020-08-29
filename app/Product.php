<?php

namespace App;

use App\Supplier;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Supplier_Product(){
        return $this->belongsTo(Supplier::class,'supplier_id','id') ;
    }

    public function Unit_Product(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function Category_Product(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
