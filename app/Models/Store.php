<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
   
    protected $fillable=[''];
    protected $table ='stores';

   public function products()
{
    return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
}

}
