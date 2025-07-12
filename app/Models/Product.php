<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    
    protected $fillable=['code','name','price','total'];
    protected $table ='products';
  
   public function stores()
{
    return $this->belongsToMany(Store::class)->withPivot('quantity')->withTimestamps();
}
}
