<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title','sku','price','stock','image','description'
    ];

   public function images()
   {
      return $this->hasMany('App\Models\ProductImage');
   }

}
